<?php
// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function itemTypes()
    {
        return $this->hasMany(ItemType::class);
    }

    public function userAppliances()
    {
        return $this->hasMany(UserAppliance::class);
    }
}
