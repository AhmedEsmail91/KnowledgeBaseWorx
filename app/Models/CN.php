<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CN extends Model
{
    use HasFactory;
    protected $fillable = ['CN-number', 'start_range', 'end_range', 'Hunt_Group'];
    protected $casts = [
        'Hunt_Group' => 'array',
    ];
    public function account()
    {
        return $this->hasMany(Account::class, 'c_n_id', 'account_id');
    }
    /*protected static function booted()
    {
        static::created(function ($cn) {
            // Loop through the range from start_lines to end_lines
            for ($number = $cn->start_range; $number <= $cn->end_range; $number++) {
                DB::table('lines_management')->insert([
                    'cn_id' => $cn->id,
                    'number'=>$number,
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);
            }
        });
    }*/
/*    public function cnLines()
    {
        return $this->hasMany(cn_lines::class, 'cn_id');
    }*/

}
