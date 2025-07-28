<?php
// app/Models/UserAppliance.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAppliance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'item_type_id',
        'brand_id',
        'model_entry_id',
        'warranty_id',
        'purchase_date',
        'next_service_date',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function modelEntry()
    {
        return $this->belongsTo(ModelEntry::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }
}
