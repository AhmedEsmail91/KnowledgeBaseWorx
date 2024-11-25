<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Undefined;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'job_nature','thumbnail','hotline', 'branch_id', 'services', 'kaspersky_id', 'aheeva_id','CN_id','Inbound-Lines','Outbound-Lines'];
    protected $casts = [
        'Inbound-Lines'=>'array',
        'Outbound-Lines'=>'array',
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
    public function CN()
    {
        return $this->belongsToMany(CN::class, 'acc_cns', 'account_id', 'c_n_id');
    }
}
