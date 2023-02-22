<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $fillable =  ['wallet_id','first_name','last_name','email','password','is_expert'];


    protected $hidden = [
        'password',
        'email',
        'expert',
        'is_expert',
        'created_at',
        'updated_at',
        'pivot'
    ];


    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'wallet_id');
    }


    public function user_rates()
    {
        return $this->belongsToMany(ExpertConsulting::class,'rates','user_id', 'expert_consulting_id')
        ->using(Rate::class)->withtimestamps()->withpivot('rate');
    }

    public function favorite_experts()
    {
        return $this->belongsToMany(Expert::class, 'favorite_experts', 'user_id', 'expert_id')->using(FavoriteExpert::class)->withTimestamps();
    }

    public function appointments()
    {
        return $this->belongsToMany(Expert::class, 'appointments', 'user_id', 'expert_id')->using(Appointment::class)->
        withTimestamps()->withPivot('number_of_hours', 'start_time', 'day')->
        select('experts.expert_id', 'day', 'start_time', 'number_of_hours');
        }    

    public function expert()
    {
        return $this->hasOne(Expert::class, 'expert_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'user_id');
    }

    public function participants()
    {
        return $this->hasMany(ChatParticipant::class, 'user_id');
    }

    // public function new_message()
    // {
    //     return $this->hasMany(ChatMessage::class, 'user_id');
    // }



}
