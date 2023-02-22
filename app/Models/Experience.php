<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $primaryKey = 'experience_id';
    protected $fillable =  ['name', 'description', 'expert_id'];
    protected $hidden = ['expert_id','created_at','updated_at'];

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expert_id');
    }

}
