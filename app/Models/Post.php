<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['title', 'content'];
}