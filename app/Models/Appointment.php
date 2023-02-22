<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Appointment extends Pivot
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable =  ['user_id','expert_id','start_time', 'number_of_hours','day'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
}
