<?php
declare(strict_types=1);

namespace AvtoDev\ExtendedLaravelValidator\Tests\Helpers;

use AvtoDev\ExtendedLaravelValidator\Helpers\Strings;
use AvtoDev\ExtendedLaravelValidator\Tests\AbstractUnitTestCase;

/**
 * @covers \AvtoDev\ExtendedLaravelValidator\Helpers\Strings
 */
class StringsTest extends AbstractUnitTestCase
{
    /**
     * @return void
     */
    public function testHasAtLeastOneNotZeroNumber(): void
    {
        $cases = [
            '0000' => false,
            'bar0' => false,
            '00001' => true,
            'foobar' => false,
            '123456789' => true,
            '1234567890' => true,
            '0123456789' => true,
            '0123405678090' => true,
        ];

        foreach ($cases as $value => $expected) {
            $this->assertSame(
                $expected, Strings::hasAtLeastOneNotZeroDigit((string)$value),
                'Case "' . $value . '" failed'
            );
        }
    }

    /**
     * @return void
     */
    public function testHasOnlyUpperLatinAlfa(): void
    {
        $cases = [
            'BAR0' => true,
            '0000' => false,
            'bar0' => false,
            'FOOBAR' => true,
            '*F-*OO' => true,
            'foobar' => false,
            'BAR 0 FOO' => true,
            '123456789' => false,
            'BAR 0 FOO-' => true,
            '1234567890' => false,
            '0123456789' => false,
            '0123405678090' => false,
            'ФD}}}}' => true,
        ];

        foreach ($cases as $value => $expected) {
            $this->assertSame(
                $expected, Strings::hasAtLeastOneLatinLetter((string)$value),
                'Case "' . $value . '" failed'
            );
        }
    }
}
