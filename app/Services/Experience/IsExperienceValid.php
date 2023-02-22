<?php 

namespace App\Services\Experience; 

use Exception;

class IsExperienceValid
{
    public static function check(array $experience_names, array $experience_descriptions) :void
    {
        foreach(array_keys($experience_names) as $key) 
            if(!(isset($experience_descriptions[$key])))
                throw new Exception('Experience must have description');

        foreach(array_keys($experience_descriptions) as $key)
            if(!isset($experience_names[$key]))
                throw new Exception('Description must have experience name');
    }
}