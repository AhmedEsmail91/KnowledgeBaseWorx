<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['job_title'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
