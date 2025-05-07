<?php

namespace App\Models\Ord;

use App\Enums\ContractorRole;
use App\Enums\LegalForm;
use Illuminate\Database\Eloquent\Model;

/**
 * Контрагенты (рекламодатели, рекламные агентства, операторы рекламных систем и издатели)
 *
 * @property int            $id
 * @property int            $created_at
 * @property int            $updated_at
 *
 * @property string         $name
 * @property string         $inn
 * @property LegalForm      $legal_form
 * @property ContractorRole $role
 *
 * @property string         $ord_id
 * @property array          $ord_states
 *
 * @method static ContractorQueryBuilder query()
 */
class Contractor extends Model
{

    protected $table = 'fresh_contractors';

    protected static string $builder = ContractorQueryBuilder::class;

    protected $fillable = [
        'name',
        'inn',
        'legal_form',
        'role'
    ];

    protected function casts(): array
    {
        return [
            'legal_form' => LegalForm::class,
            'role'       => ContractorRole::class,
            'ord_states' => 'array'
        ];
    }
}
