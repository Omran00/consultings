<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulting extends Model
{
    use HasFactory;

    protected $primaryKey = 'consulting_id';
    protected $fillable =  ['consulting_name','expert_id'];
    protected $hidden = [
        'expert_id',
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function consulting_experts()
    {
        return $this->belongsToMany(Expert::class, 'expert_consultings', 'consulting_id', 'expert_id')->using(ExpertConsulting::class);
    }
}
