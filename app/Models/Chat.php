<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $primaryKey = 'chat_id';
    protected $fillable = ['user_id', 'name'];

    protected $hidden = [
        'user_id',
        'participants',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function expert()
    {
        return $this->hasOne(Expert::class, 'expert_id');
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'chat_id');
    }

    public function participants()
    {
        return $this->hasMany(ChatParticipant::class, 'chat_id');
    }

    public function last_message()
    {
        return $this->hasOne(ChatMessage::class, 'chat_id')->latest('updated_at');   
    }

    public function scopeHasParticipant($query, int $userId)
    {

    }
}
