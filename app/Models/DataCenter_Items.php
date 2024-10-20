<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCenter_Items extends Model
{
    use HasFactory;
    protected $fillable = ['data_center_id','item_id'];

}
