<?php
declare(strict_types=1);

namespace AvtoDev\ExtendedLaravelValidator\Tests;


use AvtoDev\ExtendedLaravelValidator\Extensions\BodyCodeValidatorExtension;

/**
 * Класс для измерения скорости выполнения кода.
 *
 * @coversNothing
 */
class SpeedTest extends AbstractUnitTestCase
{
    protected ?int $chars_count = 8;

    protected ?array $chars = ['A', 'B', 'E', 'K', 'M', 'P', 'Y', 'X',];

    /**
     * Метод, который позволяет замерить время работы.
     * @return void
     */
    public function testSpeed(): void
    {
        $filename = '';
        $is_valid = $not_valid = 0;

        if ($filename === '') {
            $values = [];
            for ($i = 0; $i < 0; $i++) {
                $values[] = $this->makeString(10);
            }
        } else {
            $values = array_map(function ($value) {
                return \trim($value);
            }, $this->getFromFile($filename));
        }

        $validator = new BodyCodeValidatorExtension();
        $start = microtime(true);

        foreach ($values as $value) {
            $result = $validator->passes('foo', $value);

            if ($result === false) {
                $not_valid++;
            } else {
                $is_valid++;
            }
        }

        $end = microtime(true);

        $time_elapsed = $end - $start;

        // echo sprintf("Время выполнения: %.6f сек.\n", $time_elapsed);
        // echo sprintf("Невалидных: %d шт.\n", $not_valid);
        // echo sprintf("Валидных: %d шт.\n", $is_valid);

        $this->assertTrue(true);
    }

    /**
     * Возвращает "валидный" VIN при $length = 17.
     *
     * @param int $length
     * @return string
     */
    protected function makeString(int $length): string
    {
        $string = '';

        for ($i = 0; $i < ($length - 4); $i++) {
            $string .= $this->chars[mt_rand(0, $this->chars_count - 1)];
        }

        $string .= '1234';

        return $string;
    }

    /**
     * Читает файл и возвращает массив строк.
     *
     * @param $filename
     * @return array<int, string>
     */
    protected function getFromFile($filename): array
    {
        $result = file($filename);

        if ($result === false) {
            throw new \RuntimeException('File not found');
        }

        return file($filename);
    }
}
