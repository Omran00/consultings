<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rate extends Pivot
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
    ];

    // public function expert()
    // {
    //     return $this->belongsTo(ExpertConsulting::class, 'expert_consulting_id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(user::class, 'user_id');
    // }


}
