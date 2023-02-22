<?php 

namespace App\Services\Day; 

use Illuminate\Database\Eloquent\Relations\HasMany;

class GetFreeDayService
{
    public static function get(HasMany $free_day, int $day) :mixed
    {
        return $free_day->firstWhere('day', $day);
    }
}