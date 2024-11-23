<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinesManagement extends Model
{
    use HasFactory;

    protected $fillable = ['cn_id', 'number','account_id','type'];
    public function circuitNumber()
    {
        return $this->belongsTo(CN::class);
    }
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
