<?php 

namespace App\Services\Wallet; 

class CalculateCostService
{
    public static function cost(float $cost, int $hours_number) :float
    {
        return $cost * $hours_number;
    }
}