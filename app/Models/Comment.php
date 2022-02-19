<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['worker_id', 'post_id', 'comment_title'];

    protected $hidden = ['created_at', 'updated_at'];

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
