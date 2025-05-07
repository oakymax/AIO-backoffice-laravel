<?php

namespace App\Console\Commands;

use App\Enums\LegalForm;
use App\Models\Ord\Contractor;
use App\Models\Ord\Mediascount\Enums\MediascoutClientStatus;
use App\Models\Ord\Mediascount\MediascoutApi;
use App\Models\Ord\Mediascount\MediascoutApiInternalError;
use App\Models\Ord\Mediascount\Requests\Cliens\CreateClientRequest;
use App\Models\Ord\Mediascount\Requests\Cliens\GetClientsRequest;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Тестовая штука-дрюка';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $api = new MediascoutApi(
            sandbox: true,
            login: 'maksim.k@maergroup.ru',
            password: 'F5s3Lvt/Bw'
        );

        $response = $api->createClient(new CreateClientRequest(
            inn: '7743738859',
            legalForm: LegalForm::Entity,
            name: 'Банная Усадьба'
        ));

        $this->info($response->code);
        $this->info(json_encode($response->body, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}
