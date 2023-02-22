<?php 

namespace App\Services\Consulting;

use App\Models\Expert;

class ExpertConsultingService
{
    public static function expert_consultings(Expert $expert) :mixed
    {
        return $expert->expert_consultings();
    }
}