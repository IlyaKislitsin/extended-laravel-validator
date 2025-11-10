<?php
declare(strict_types=1);

namespace AvtoDev\ExtendedLaravelValidator\Helpers;

class Strings
{
    /**
     * @param string $value
     * @return bool
     */
    public static function hasAtLeastOneNotZeroDigit(string $value): bool
    {
        return \preg_match('/[1-9]/', $value) === 1;
    }

    /**
     * @param string $upper_value Строка в верхнем регистре.
     * @return bool
     */
    public static function hasAtLeastOneLatinLetter(string $upper_value): bool
    {
        return \preg_match('/[A-Z]/', $upper_value) === 1;
    }

    /**
     * @param string $upper_value Строка в верхнем регистре.
     * @return bool
     */
    public static function hasAtLeastOneCyrLetter(string $upper_value): bool
    {
        return \preg_match('/[А-ЯЁ]/u', $upper_value) === 1;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function hasOnlyUppercaseLetters(string $value): bool
    {
        return \preg_match('/[a-zа-яё]/u', $value) === 0;
    }

    /**
     * @param string $upper_value Строка в верхнем регистре.
     * @return bool
     */
    public static function hasOnlyLettersAndDigits(string $upper_value): bool
    {
        return \preg_match('/^[A-ZА-ЯЁ0-9]+$/u', $upper_value) === 1;
    }
}
