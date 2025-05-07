<?php

namespace App\Models\Ord\Mediascount;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Отчёт об ошибке API Медиаскаут
 */
readonly class MediascoutApiInternalError implements Arrayable
{

    public function __construct(
        public ?string $type = null,
        public ?string $title = null,
        public ?int    $status = null,
        public ?string $detail = null,
        public ?string $instance = null
    )
    {
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public static function fromArray(array $array): self
    {
        return new self(
            type: $array['type'] ?? null,
            title: $array['title'] ?? null,
            status: $array['status'] ?? null,
            detail: $array['detail'] ?? null,
            instance: $array['instance'] ?? null,
        );
    }
}