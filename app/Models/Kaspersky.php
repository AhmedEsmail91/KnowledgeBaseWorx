<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaspersky extends Model
{
    use HasFactory;
    protected $fillable = ['Ip', 'rack', 'branch_id'];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
