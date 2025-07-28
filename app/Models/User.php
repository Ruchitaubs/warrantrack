<?php
// app/Models/User.php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name','email','password'];
    protected $hidden   = ['password','remember_token'];

    public function appliances()
    {
        return $this->hasMany(UserAppliance::class);
    }
}
