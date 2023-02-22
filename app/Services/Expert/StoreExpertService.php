<?php 

namespace App\Services\Expert; 

use App\Models\Expert;
use App\Services\Image\ImageService;
use App\Services\User\GetUserService;
use App\Services\Time\ValidTimeService;
use App\Http\Requests\StoreExpertRequest;
use App\Services\Consulting\StoreConsultingService;
use App\Services\Day\CheckWeekDaysService;
use App\Services\Experience\IsExperienceValid;
use App\Services\Experience\StoreExperienceService;
use App\Services\PhoneNumber\StorePhoneNumberService;
use App\Services\PhoneNumber\ValidPhoneNumberService;
use App\Services\Time\StoreTimeService;

class StoreExpertService
{
    public static function create(StoreExpertRequest $request) :void
    {
        $data              = $request->validated();
        $data['expert_id'] = GetUserService::get_user()->user_id;
        if($request->hasFile('image')) $data['image'] = ImageService::upload_image($request->file('image'));
        else                           $data['image'] = ImageService::default();
        // validation
        IsRegisterdService::     check($data['expert_id']);
        ValidPhoneNumberService::is_valid($data['phone_number']);
        IsExperienceValid::      check($data['experience_name'], $data['experience_description']);
        CheckWeekDaysService::   check_week_days($data['start_time'], $data['end_time']);
        ValidTimeService::       is_valid($data['start_time'], $data['end_time']);

        // creating data
        Expert::                 create($data);
        StorePhoneNumberService::create($data['phone_number']);
        StoreExperienceService:: create($data['experience_name'], $data['experience_description']);
        StoreConsultingService:: create($data['consulting_name']);
        StoreTimeService::       create($data['start_time'], $data['end_time']);
    }
}