<?php

namespace App\Models\Ord\Mediascount\Requests\Contracts;

use Illuminate\Contracts\Support\Arrayable;

readonly class CreateInitialContractByCidRequest implements Arrayable
{

    public function __construct(
        public string  $cid,
        public string  $finalContractId,
        public ?string $contractorId,
        public ?string $clientId,
        public ?string $number,
    )
    {

    }

    /** @inheritdoc */
    public function toArray(): array
    {
        return [
            'cid'             => $this->cid,
            'finalContractId' => $this->finalContractId,
            'contractorId'    => $this?->contractorId,
            'clientId'        => $this?->clientId,
            'number'          => $this?->number,
        ];
    }
}