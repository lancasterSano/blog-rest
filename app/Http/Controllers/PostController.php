<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Post::RULES);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()])->setStatusCode(400);
        }

        $post = Post::create($request->all());

        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), Post::RULES);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()])->setStatusCode(400);
        }

        $post->update($request->all());

        return response()->json($post, 200);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
