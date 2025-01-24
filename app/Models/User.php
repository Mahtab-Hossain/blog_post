<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['name', 'email', 'password'];
}