<?php

namespace App\Models\Ord\Mediascount\Requests\Cliens;

use App\Models\Ord\Mediascount\Enums\MediascoutClientStatus;
use Illuminate\Contracts\Support\Arrayable;

readonly class GetClientsRequest implements Arrayable
{

    public function __construct(
        public ?string                 $id = null,
        public ?string                 $inn = null,
        public ?MediascoutClientStatus $status = null
    )
    {

    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_filter([
            'Id' => $this->id,
            'Inn' => $this->inn,
            'Status' => $this->status?->value
        ]);
    }
}