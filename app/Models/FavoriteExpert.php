<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FavoriteExpert extends Pivot
{
    use HasFactory;

    protected $table = 'favorite_experts';

    protected $hidden = [
        'password',
        //'email',
        // 'expert',
         'pivot'
    ];

}
