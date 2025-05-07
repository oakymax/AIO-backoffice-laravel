<?php

namespace App\Enums;

/**
 * Роль контрагента
 */
enum ContractorRole: string
{

    /** Оператор рекламной системы */
    case AdvertisingSystemOperator = 'ors';

    /** Рекламодатель */
    case Advertiser = 'advertiser';

    /** Рекламное агентство */
    case AdvertisingAgency = 'agency';

    /** Издатель (паблишер) */
    case Publisher = 'publisher';
}
