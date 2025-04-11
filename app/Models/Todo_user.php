<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo_user extends Model
{
    protected $fillable = [
        'email',
        'password'
    ];
}
