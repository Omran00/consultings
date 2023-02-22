<?php 

namespace App\Services\Expert; 

use Exception;
use App\Models\Expert;

class IsRegisterdService
{
    public static function check(int $expert_id) :void
    {
        $expert = Expert::find($expert_id);
        if($expert)
            throw new Exception('This expert has already registered');
    }
}