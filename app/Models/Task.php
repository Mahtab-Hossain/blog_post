<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['title', 'is_completed'];
}