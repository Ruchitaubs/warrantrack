<?php
// app/Models/ItemType.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemType extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }

    public function userAppliances()
    {
        return $this->hasMany(UserAppliance::class);
    }
}
