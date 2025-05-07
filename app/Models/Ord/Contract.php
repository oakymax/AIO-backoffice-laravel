<?php

namespace App\Models\Ord;

use Illuminate\Database\Eloquent\Model;

/**
 * Договоры
 *
 * @property int    $id
 *
 * @property int    $created_at
 * @property int    $updated_at
 *
 *
 *
 * @property string $ord_id
 * @property array  $ord_states
 */
class Contract extends Model
{

    protected $table = 'fresh_contracts';

    protected static string $builder = ContractQueryBuilder::class;


}