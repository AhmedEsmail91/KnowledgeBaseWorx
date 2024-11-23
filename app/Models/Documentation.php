<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','pdf','created_by','section_id'];
    protected $casts=['description'=>'array'];
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }
    public function account(){
        return $this->belongsTo(Account::class,'special');
    }
}
