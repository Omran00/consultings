<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $primaryKey = 'chat_message_id';
    protected $fillable = ['user_id', 'chat_id', 'message'];

    protected $hidden = [
        'chat_id',
        'user',
        'chat_message_id',

        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

}
