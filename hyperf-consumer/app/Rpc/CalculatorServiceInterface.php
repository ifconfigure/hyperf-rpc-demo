<?php

namespace App\Rpc;

interface CalculatorServiceInterface
{
    public function add(int $a, int $b): int;
}