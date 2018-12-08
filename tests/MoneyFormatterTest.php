<?php

namespace App\Tests;

use App\FormatterService\MoneyFormatter;
use App\FormatterService\NumberFormatterInterface;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function testMoneyFormat()
    {
        $number = $this->createMock(NumberFormatterInterface::class);
        $number->expects($this->exactly(2))
            ->method('numberFormatter')
            ->willReturn('2.84M');
        $moneyFormatter = new MoneyFormatter($number);
        $this->assertEquals("$2.84M", $moneyFormatter->formatUsd(2835779));
        $this->assertEquals("2.84M €", $moneyFormatter->formatEur(2835779));

    }
}
