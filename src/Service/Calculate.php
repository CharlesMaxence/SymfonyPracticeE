<?php

namespace App\Service;

class Calculate
{
    public function sum(int|float $a, int|float $b): int|float
    {
        return $a + $b;
    }

    public function subtract(int|float $a, int|float $b): int|float
    {
        return $a - $b;
    }

    public function multiply(int|float $a, int|float $b): int|float
    {
        return $a * $b;
    }

    public function divide(int|float $a, int|float $b): int|float
    {
        if ($b == 0) {
            throw new \InvalidArgumentException("Division by zero is not allowed.");
        }
        return $a / $b;
    }
}