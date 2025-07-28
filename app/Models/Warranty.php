<?php
// app/Models/Warranty.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = ['item_type_id', 'label', 'months'];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function userAppliances()
    {
        return $this->hasMany(UserAppliance::class);
    }
}
