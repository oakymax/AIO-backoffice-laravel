<?php

namespace App\Models\Ord\Mediascount;

use App\Models\Ord\Mediascount\Requests\Cliens\CreateClientRequest;
use App\Models\Ord\Mediascount\Requests\Cliens\GetClientsRequest;
use App\Models\Ord\Mediascount\Requests\Contracts\CreateInitialContractByCidRequest;
use App\Models\Ord\Mediascount\Traits\MakesRequestsToMediascout;

class MediascoutApi
{

    use MakesRequestsToMediascout;

    /**
     * Получить список заказчиков
     *
     * @param GetClientsRequest|null $request
     *
     * @return MediascoutApiResponse
     */
    public function getClients(?GetClientsRequest $request = null): MediascoutApiResponse
    {
        return $this->get('v3/clients', $request?->toArray() ?: []);
    }

    /**
     * Создать заказчика
     *
     * @param CreateClientRequest $request
     *
     * @return MediascoutApiResponse
     */
    public function createClient(CreateClientRequest $request): MediascoutApiResponse
    {
        return $this->post('v3/clients', $request->toArray());
    }

    /**
     * Получить Cid (идентификатор договора в ЕРИР) для договора любого типа
     * (работает только на продовом контуре, в песочнице пятисотит)
     */
    public function getContractCid(string $contractId): MediascoutApiResponse
    {
        return $this->get("v3/contracts/{$contractId}/cid");
    }

    public function getFinalContracts(): MediascoutApiResponse
    {
        return $this->get('v3/contracts/final');
    }

    /**
     * Создать изначальный Cid-договор (по идентификатору договора в ЕРИР)
     *
     * @param CreateInitialContractByCidRequest $request
     *
     * @return MediascoutApiResponse
     */
    public function createInitialContractByCid(CreateInitialContractByCidRequest $request): MediascoutApiResponse
    {
        return $this->post('v3/contracts/cid', $request->toArray());
    }
}