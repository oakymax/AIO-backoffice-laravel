<?php

namespace App\Services;

use Opcodes\LogViewer\Logs\Log;

class MediascoutLog extends Log
{
    public static string $name = 'Mediascout';

    public static string $regex = '/^\[(?P<datetime>[\d\-+ :]+)\] (?P<environment>[a-z]*)\.(?P<level>[a-zA-Z]+): (?P<arguments>(?:\[[^\[\]]*\]){0,8}) (?P<message>\N*)$/';

    public static array $columns = [
        ['label' => 'Severity', 'data_path' => 'level'],
        ['label' => 'Datetime', 'data_path' => 'datetime'],
        ['label' => 'Method', 'data_path' => 'extra.method'],
        ['label' => 'Path', 'data_path' => 'extra.path'],
        ['label' => 'Result', 'data_path' => 'extra.result'],
    ];

    protected function fillMatches(array $matches = []): void
    {
        parent::fillMatches($matches);

        $this->context = json_decode($matches['message'] ?? '', true) ?? [];
        $arguments = explode('][', trim($matches['arguments'] ?? '', ']['));

        $this->extra['method'] = $arguments[0] ?? '?';
        $this->extra['path'] = $arguments[1] ?? '?';
        $this->extra['result'] = $arguments[2] ?? '?';
    }
}