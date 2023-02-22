<?php 

namespace App\Services\Consulting;

use App\Models\Consulting;

class FindConsultingService
{
    public static function find(string $consulting) :?Consulting
    {
        return Consulting::where('consulting_name', $consulting)->first();
    }
}