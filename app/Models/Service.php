<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public function accounts()
    {
        return $this->hasMany(Account::class, 'service_id', 'account_id');
    }
}
