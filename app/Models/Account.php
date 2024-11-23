<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Undefined;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'job_nature','thumbnail','hotline', 'branch_id', 'services', 'kaspersky_id', 'aheeva_id'];
    protected $casts = [
        'services' => 'array',
        'job_nature' => 'array',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'account_services', 'account_id', 'service_id');
    }

    public function kaspersky()
    {
        return $this->belongsTo(Kaspersky::class);
    }
    public function aheeva()
    {
        return $this->belongsTo(Aheeva::class);
    }
    public function cnLines()
    {
        return $this->belongsToMany(cn_lines::class, 'acc__lines', 'account_id', 'line_id');
    }
    // public function setDefaultType()
    // {
    //     if (empty($this->type)) {
    //         $this->type = 'inbound'; // or 'outbound' based on your requirement
    //     }
    // }

//    protected static function booted()
//    {
//        static::creating(function ($account) {
//            // Access form data from the request
//            $formData = request()->all();
//
//            dd(json_decode($formData['components'][0]['snapshot']));
//        });
//    }
    // protected static function booted()
    // {
    //     static::created(function ($account) {

    //     });
    // }
}
