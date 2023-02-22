<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $primaryKey = 'phone_number_id';
    protected $fillable =  ['phone_number', 'expert_id'];
    protected $hidden = ['expert_id','created_at','updated_at'];

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expert_id');
    }


}
