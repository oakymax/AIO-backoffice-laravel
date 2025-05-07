<?php

namespace App\Models\Ord\Mediascount\Enums;

/**
 * Справочник API Медиаскаут: Статус контрагента в ОРД
 */
enum MediascoutClientStatus: string
{

    /** Создан в БД (наша валидация пройдена). Пока не используется, сущность сразу переходит в статус [Ожидает регистрации]. */
    case Created = 'Created';

    /** Ожидает регистрации в ЕРИР */
    case RegistrationRequired = 'RegistrationRequired';

    /** Идет регистрация, быстрый контроль ЕРИР пройден, ждем уточненного ответа */
    case Registering = 'Registering';

    /** Активный (оба этапа ЕРИР-регистрации завершены успешно) */
    case Active = 'Active';

    /** Ошибка регистрации ЕРИР (любого этапа) */
    case RegistrationError = 'RegistrationError';

    /** Заблокирован (применимо только к TopLevelAgency) */
    case Blocked = 'Blocked';
}
