<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "skill_id",
        "url",
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
