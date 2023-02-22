<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FreeAppointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'free_appointment_id';
    protected $fillable = ['expert_id', 'day', 'start_time', 'end_time'];

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expert_id');
    }

    public function free_times()
    {
        return $this->hasMany(FreeTime::class, 'free_appointment_id');
    }

}
