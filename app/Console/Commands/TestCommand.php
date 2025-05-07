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
        // тестовый AIO
        $api = new MediascoutApi(
            sandbox: true,
            login: 'M0000487',
            password: 'lyUYcos4'
        );

        $api = new MediascoutApi(
            sandbox: false,
            login: 'yulia.sh@maergroup.ru',
            password: 'AIO/2354'
        );


        $response = $api->getFinalContracts();
//        $response = $api->getContractCid('CTBc4iBNg5N06MoKMtBH_HBg');

        $this->info($response->code);
        $this->info(json_encode($response->body, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

//        foreach ($response->body as $contract) {
//            if (!empty($contract['cid'])) {
//                $this->warn($contract['id']);
//            }
//        }
    }
}
