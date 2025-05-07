<?php

namespace App\Models\Ord;

use Illuminate\Database\Eloquent\Builder;

/**
 * @extends Builder<Contractor>
 */
class ContractorQueryBuilder extends Builder
{
    public function byInn(string $inn): self
    {
        return $this->where('inn', '=', $inn);
    }
}