<?php

namespace App\Models\Ord\Mediascount\Enums;

use App\Enums\LegalForm;

/**
 * Справочник API Медиаскаут: Юридическая форма заказчика
 */
enum MediascoutClientLegalForm: string
{

    /** Юрлицо РФ */
    case JuridicalPerson = 'JuridicalPerson';

    /** Индивидуальный предприниматель РФ */
    case IndividualEntrepreneur = 'IndividualEntrepreneur';

    /** Физлицо РФ или самозанятый */
    case PhysicalPerson = 'PhysicalPerson';

    /** Иностранное юрлицо */
    case InternationalJuridicalPerson = 'InternationalJuridicalPerson';

    /** Иностранное физлицо */
    case InternationalPhysicalPerson = 'InternationalPhysicalPerson';

    public function toAppLegalForm(): LegalForm
    {
        return match ($this) {
            self::JuridicalPerson => LegalForm::Entity,
            self::IndividualEntrepreneur => LegalForm::IP,
            self::PhysicalPerson => LegalForm::Individual,
            self::InternationalJuridicalPerson => LegalForm::ForeignEntity,
            self::InternationalPhysicalPerson => LegalForm::ForeignIndividual,
        };
    }

    public static function fromAppLegalForm(LegalForm $value): self
    {
        return match ($value) {
            LegalForm::Entity => self::JuridicalPerson,
            LegalForm::IP => self::IndividualEntrepreneur,
            LegalForm::Individual => self::PhysicalPerson,
            LegalForm::ForeignEntity => self::InternationalJuridicalPerson,
            LegalForm::ForeignIndividual => self::InternationalPhysicalPerson,
        };
    }
}
