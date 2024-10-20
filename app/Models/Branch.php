<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location'];
    public function dataCenters()
    {
        return $this->hasMany(DataCenter::class);
    }
}
