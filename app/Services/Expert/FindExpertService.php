<?php 

namespace App\Services\Expert; 

use App\Models\Expert;

class FindExpertService
{
    public static function find_expert(int $expert_id) : Expert
    {
        $expert = Expert::find($expert_id);
        IsExpertService:: check($expert);
        return $expert;
    }
}