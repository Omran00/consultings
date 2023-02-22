<?php 

namespace App\Services\Time; 

use Exception;

class CheckTimeOrderService
{
    public static function check(array $times) :void
    {
        foreach($times as $days)
            for($i = 0; $i < count($days) - 1; $i++)
                if(strtotime($days[$i]) >= strtotime($days[$i + 1]))
                    throw new Exception('Times should be inserted in order');
    }
}