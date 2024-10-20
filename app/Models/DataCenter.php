<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCenter extends Model
{
    use HasFactory;
    protected $fillable = ['items', 'branch_id','rack'];
    public function items()
    {
        return $this->belongsToMany(Item::class, 'data_center__items', 'data_center_id', 'item_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public static function getAllDataCenter()
    {
        return self::with('items')->get()->each(function ($dataCenter) {
            $dataCenter->items->each->makeHidden('id');
        })->toArray();
    }
    public static function createNewDataCenter($items, $rack, $branchId)
    {
        $dataCenter = self::create([
            'rack' => $rack,
            'branch_id' => $branchId,
        ]);

        $dataCenter->items()->attach($items);
        return $dataCenter;
    }
}

