<?php

declare(strict_types = 1);

namespace AvtoDev\ExtendedLaravelValidator\Extensions;

/**
 * Правило валидации номера шасси транспортного средства.
 */
class ChassisCodeValidatorExtension extends BodyCodeValidatorExtension
{
    /**
     * {@inheritdoc}
     */
    public function name(): string
    {
        return 'chassis_code';
    }
}
