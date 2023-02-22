<?php 

namespace App\Services\Experience;

use App\Services\User\GetUserService;

class StoreExperienceService
{
    public static function create(array $experience_names, array $experience_descriptions) :void
    {
        $expert = GetUserService::get_user()->expert;
        foreach($experience_names as $key => $experience_name)
        {
            $expert->experiences()->create([
                'name' => $experience_name,
                'description' => $experience_descriptions[$key],
                'expert_id' => $expert->expert_id
            ]);
        }
    }
}