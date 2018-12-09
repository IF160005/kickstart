<?php

namespace App\FormatterService;


interface NumberFormatterInterface
{
    /**
     * @param float $number
     * @return string
     */
    public function numberFormatter(float $number): string ;

}