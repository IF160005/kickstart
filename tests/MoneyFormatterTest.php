<?php

namespace App\Tests;

use App\FormatterService\MoneyFormatter;
use App\FormatterService\NumberFormatterInterface;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function providerNumber()
    {
        return [
            ["$2.84M", "2.84M €", "2.84M", 2835779],
            ["$211.99", "211.99 €", "211.99", 211.99],
        ];
    }

    /**
     * @dataProvider providerNumber
     * @param $usd
     * @param $eur
     * @param $value
     * @param $number
     */
    public function testMoneyFormat($usd, $eur, $value, $number)
    {
        $numberFormatter = $this->createMock(NumberFormatterInterface::class);
        $numberFormatter->expects($this->exactly(2))
            ->method('numberFormatter')
            ->willReturn($value);
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals($usd, $moneyFormatter->formatUsd($number));
        $this->assertEquals($eur, $moneyFormatter->formatEur($number));
    }
}
