<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description','type', 'data_center_id'];
    protected $casts = [
        'description' => 'array',
    ];
    public function dataCenters()
    {
        return $this->belongsToMany(DataCenter::class, 'data_center__items', 'item_id', 'data_center_id');
    }
}
