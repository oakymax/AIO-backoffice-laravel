<?php

namespace App\Models\Ord\Mediascount\Enums;

/**
 * Справочник API Медиаскаут: Тип отношения заказчика к агентству
 */
enum MediascoutClientCreateMode: string
{
    /** Прямой клиент для заданного агентства (т.е. может быть заказчиком по конечным договорам с этим агентством) */
    case DirectClient = 'DirectClient';

    /** Клиент, создаваемый в качестве заказчика или исполнителя у создаваемого изначального договора */
    case InitialContractClient = 'InitialContractClient';
}
