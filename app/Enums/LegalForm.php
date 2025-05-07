<?php

namespace App\Enums;

/**
 * Юридическая форма контрагента
 */
enum LegalForm: string
{
    /** Юр. лицо */
    case Entity = 'entity';

    /** ИП */
    case IP = 'ip';

    /** Физ. лицо */
    case Individual = 'individual';

    /** Иностранное юр. лицо */
    case ForeignEntity = 'foreign_entity';

    /** Иностранное физ. лицо */
    case ForeignIndividual = 'foreign_individual';

}
