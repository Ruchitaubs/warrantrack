<?php
// app/Models/Brand.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['item_type_id', 'name'];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function modelEntries()
    {
        return $this->hasMany(ModelEntry::class);
    }

    public function userAppliances()
    {
        return $this->hasMany(UserAppliance::class);
    }
}
