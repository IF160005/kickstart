<?php

namespace App\FormatterService;


class MoneyFormatter
{
    /**
     * @var NumberFormatterInterface
     */
    private $numberFormatter;

    /**
     * MoneyFormatter constructor.
     * @param NumberFormatterInterface $numberFormatter
     */
    public function __construct(NumberFormatterInterface $numberFormatter)
    {

        $this->numberFormatter = $numberFormatter;
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatEur(float $number): string
    {
        return $this->numberFormatter->numberFormatter($number) ." €";

    }

    /**
     * @param $number
     * @return string
     */
    public function formatUsd(float $number): string
    {
        $number = $this->numberFormatter->numberFormatter($number);
        return "$" . $number;
    }
}