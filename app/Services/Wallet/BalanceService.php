<?php 

namespace App\Services\Wallet; 

use App\Models\Wallet;

class BalanceService
{
    public static function get(Wallet $wallet) :float
    {
        return $wallet->balance;
    }

}