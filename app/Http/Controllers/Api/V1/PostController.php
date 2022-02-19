<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'worker_id' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
        ]);


        return  Post::create([
            'worker_id' => request('worker_id'),
            'post_title' => request('post_title'),
            'post_content' => request('post_content')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post = Post::findOrFail($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        request()->validate([
            'worker_id' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
        ]);

        $success = $post->update([
            'worker_id' => request('worker_id'),
            'post_title' => request('post_title'),
            'post_content' => request('post_content'),
        ]);

        return [
            'success' => $success
        ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $success = $post->delete();

        return [
            'success' => $success
        ];

    }
}
