<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExpertConsulting extends Pivot
{
    use HasFactory;

    protected $table = 'expert_consultings';
    protected $primaryKey = 'expert_consulting_id';

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    // public function consulting()
    // {
    //     return $this->belongsTo(Consulting::class, 'consulting_id');
    // }

    // public function expert()
    // {
    //     return $this->belongsTo(Expert::class, 'expert_id');
    // }


    public function rate_users()
    {
        return $this->belongsToMany(User::class, 'rates', 'expert_consulting_id', 'user_id')
        ->using(Rate::class)->withTimestamps()->withPivot('rate')->select('first_name', 'last_name', 'rate');
    }
}
