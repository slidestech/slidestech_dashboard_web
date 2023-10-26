<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'user_id', 'task_id',];
    //comment belongs to a task 

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
