<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function allPost()
    {
        return new PostResource(Cache::remember('posts', 60*60*24, function() {
            return Post::all();
        }));
    }

    public function postById($id)
    {

    }
}
