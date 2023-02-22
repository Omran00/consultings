<?php 

namespace App\Services\Consulting;

use App\Models\Consulting;
use App\Services\User\GetUserService;

class StoreConsultingService
{
    public static function create($consultings) :void
    {
        $expert = GetUserService::get_user()->expert;
        foreach($consultings as $key => $consulting)
        {
            $consulting = StoreConsultingService::create_if_not_exists($consulting);
            ExpertConsultingService::expert_consultings($expert)->attach([
                'consulting_id' => $consulting->consulting_id,
            ]);
        }
    }

    private static function create_if_not_exists(string $consulting_name): Consulting
    {
        $consulting = FindConsultingService::find($consulting_name);
        if(!isset($consulting))
            $consulting = Consulting::create(['consulting_name' => $consulting_name]);
        return $consulting;
    }
}

