<?php 

namespace App\Services\Wallet; 

use Exception;

class EnoughBalanceService
{
    public static function check_balance(float $balance, float $cost) :void
    {
        if($balance < $cost)
            throw new Exception('You have to charge your card first');
    }
}