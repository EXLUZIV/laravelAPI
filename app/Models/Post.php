<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['worker_id', 'post_title', 'post_content'];

    protected $hidden = ['created_at', 'updated_at'];
}
