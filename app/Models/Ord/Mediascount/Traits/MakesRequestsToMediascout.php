<?php

namespace App\Models\Ord\Mediascount\Traits;

use App\Models\Ord\Mediascount\MediascoutApiResponse;
use Illuminate\Support\Facades\Log;
use CurlHandle;
use RuntimeException;

/**
 * Методы обращения к API Медиаскаут через curl
 */
trait MakesRequestsToMediascout
{

    protected static array $baseUrls = [
        'sandbox'    => 'https://demo.mediascout.ru/webapi/',
        'production' => 'https://lk.mediascout.ru/webapi/'
    ];

    protected CurlHandle|false $curl;

    protected string $baseUrl;

    public function __construct(
        protected readonly bool   $sandbox,
        protected readonly string $login,
        protected readonly string $password
    )
    {
        $this->baseUrl = self::$baseUrls[$this->sandbox ? 'sandbox' : 'production'];

        $this->curl = curl_init();

        if ($this->curl === false) {
            throw new RuntimeException('curl_init() failed');
        }
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    protected function get(string $path, ?array $payload = []): MediascoutApiResponse|false
    {
        $query = $path;

        if (!empty($payload)) {
            $query .= '?' . http_build_query($payload);
        }

        return $this->request('GET', $query);
    }

    protected function post(string $path, array $payload = []): MediascoutApiResponse|false
    {
        return $this->request('POST', $path, $payload);
    }

    private function request(string $method, string $path, array $payload = []): MediascoutApiResponse|false
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($this->curl, CURLOPT_URL, $this->baseUrl . $path);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $payload ? json_encode($payload) : '{}');

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, [
            'accept: text/plain',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($this->login . ":" . $this->password)
        ]);

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        $response     = curl_exec($this->curl);
        $responseCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        if ($response === false) {
            $curlError = curl_error($this->curl);
            Log::channel('mediascout')->error(
                '{method} {path} request failed: {curlError}',
                compact('method', 'path', 'payload', 'curlError')
            );
            return false;
        } else {
            $response = json_decode($response, true) ?: [];

            $logMessage = '[{method}][{path}][{responseCode}]';
            $logContext = json_without_line_breaks(compact('method', 'path', 'payload', 'responseCode', 'response'));

            if ($responseCode < 400) {
                Log::channel('mediascout')->info($logMessage, $logContext);
            } elseif ($responseCode < 500) {
                Log::channel('mediascout')->warning($logMessage, $logContext);
            } else {
                Log::channel('mediascout')->error($logMessage, $logContext);
            }

            return new MediascoutApiResponse(
                code: $responseCode,
                body: $response
            );
        }
    }
}