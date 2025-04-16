<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Todo_user;

class TodoTask extends Model
{
    protected $table = 'todo_lists';

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(Todo_user::class, 'user_id');
    }
}
