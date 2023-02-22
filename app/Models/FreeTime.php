<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeTime extends Model
{
    use HasFactory;
    protected $primaryKey = 'free_time_id';
    protected $fillable = ['free_appointment_id', 'start_time', 'end_time'];

    protected $hidden =
    [
    'created_at',
    'updated_at'
    ];
    public function free_appointment()
    {
        return $this->belongsTo(FreeAppointment::class, 'free_appointment_id');
    }
}
