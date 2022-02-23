<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\PostResource;
     */
    public function index()
    {

        return PostResource::collection(Post::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return App\Models\Post $post
     */
    public function store(PostRequest $request)
    {

        $post = new Post;
        $post->worker_id=$request->worker_id;
        $post->comment_id=$request->comment_id;
        $post->post_title=$request->post_title;
        $post->post_content=$request->post_content;
        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Post $post
     * @return App\Http\Resources\PostResource
     */
    public function show(Post $post)
    {

        return new PostResource($post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $post->worker_id=$request->worker_id;
        $post->comment_id=$request->comment_id;
        $post->post_title=$request->post_title;
        $post->post_content=$request->post_content;
        $success = $post->save();

        return response()->json([
            'success' => $success
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $success = $post->delete();

        return response()->json([
            'success' => $success
        ]);

    }
}
