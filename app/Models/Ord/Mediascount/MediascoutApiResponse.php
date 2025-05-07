<?php

namespace App\Models\Ord\Mediascount;

use Illuminate\Contracts\Support\Arrayable;

readonly class MediascoutApiResponse
{

    public function __construct(
        public int   $code,
        public array $body
    )
    {
    }
}