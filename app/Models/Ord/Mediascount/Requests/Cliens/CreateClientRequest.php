<?php

namespace App\Models\Ord\Mediascount\Requests\Cliens;

use App\Enums\LegalForm;
use App\Models\Ord\Mediascount\Enums\MediascoutClientCreateMode;
use App\Models\Ord\Mediascount\Enums\MediascoutClientLegalForm;
use Illuminate\Contracts\Support\Arrayable;

readonly class CreateClientRequest implements Arrayable
{
    public function __construct(
        public string                     $inn,
        public LegalForm                  $legalForm,
        public string                     $name,
        public MediascoutClientCreateMode $createMode = MediascoutClientCreateMode::DirectClient
    )
    {

    }

    /** @inheritdoc */
    public function toArray(): array
    {
        return [
            'inn'        => $this->inn,
            'legalForm'  => MediascoutClientLegalForm::fromAppLegalForm($this->legalForm)->value,
            'name'       => $this->name,
            'createMode' => $this->createMode?->value
        ];
    }
}