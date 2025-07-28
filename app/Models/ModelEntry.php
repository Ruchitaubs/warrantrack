<?php
// app/Models/ModelEntry.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelEntry extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'name'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function userAppliances()
    {
        return $this->hasMany(UserAppliance::class);
    }
}
