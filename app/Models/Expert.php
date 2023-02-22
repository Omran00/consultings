<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $primaryKey = 'expert_id';
    protected $fillable =  ['expert_id','image', 'cost', 'country', 'city', 'street','rate','number_of_rates'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
        //'user',
        'appointments',
        'free_appointments'
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'expert_id');
    }

    public function phone_numbers()
    {
        return $this->hasMany(PhoneNumber::class, 'expert_id');
    }

    public function free_appointments()
    {
        return $this->hasMany(FreeAppointment::class, 'expert_id');
    }
    public function appointments()
    {
        return $this->belongsToMany(User::class, 'appointments', 'expert_id', 'user_id')->
        withTimestamps()->withPivot('number_of_hours', 'start_time', 'day')->
        select('first_name', 'last_name', 'day', 'start_time', 'number_of_hours')->
        orderByPivot('day','asc')->orderByPivot('start_time','asc');
    }

    public function expert_consultings()
    {
        return $this->belongsToMany(Consulting::class, 'expert_consultings', 'expert_id', 'consulting_id')->using(ExpertConsulting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'expert_id');
    }

    // public function messages()
    // {
    //     return $this->hasMany(ChatMessage::class, 'chat_id');
    // }
}
