<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['worker_id', 'post_title', 'post_content'];

    protected $hidden = ['created_at', 'updated_at'];

    public function worker(): HasOne
    {
        return $this->hasOne(Worker::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
