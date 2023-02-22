<?php

namespace App\Services\Image;

use Illuminate\Http\UploadedFile;

class ImageService
{
    public static function upload_image(UploadedFile $image): string
    {
        return $image->store('profiles', 'public');
    }

    public static function default() :string
    {
        return 'profile/default.jpg';
    }
}