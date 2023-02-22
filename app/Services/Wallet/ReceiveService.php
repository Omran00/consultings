<?php 

namespace App\Services\Wallet; 

use Illuminate\Database\Eloquent\Relations\HasOne;

class ReceiveService
{
    public static function receive(HasOne $wallet, float $appointment_cost) :void
    {
        $wallet->update(['balance' => $wallet->first()->balance + $appointment_cost]);
    }

}