<?php 

namespace App\Services\Wallet; 

use Illuminate\Database\Eloquent\Relations\HasOne;

class SetDefaultBalanceService
{
    public static function set(HasOne $wallet) :void
    {        
        $wallet->create([
            'balance' => 10000
        ]);
    }

}