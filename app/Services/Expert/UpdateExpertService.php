<?php 

namespace App\Services\Expert; 

use App\Services\Image\ImageService;
use App\Services\User\GetUserService;
use App\Http\Requests\UpdateExpertRequest;

class UpdateExpertService
{
    public function update(UpdateExpertRequest $request) :void
    {
        $data = $request->validated();
        if($request->hasFile('image')) $data['image'] = ImageService::upload_image($request->file('image'));
        GetUserService::get_user()->expert->update($data);
    }

}