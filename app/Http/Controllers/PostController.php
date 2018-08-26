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
        $data = json_decode($request->getContent(), true);
        $validator = Validator::make($data, Post::RULES);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()])->setStatusCode(400);
        }

        $post = Post::create($data);

        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post)
    {
        $data = json_decode($request->getContent(), true);
        $validator = Validator::make($data, Post::RULES);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()])->setStatusCode(400);
        }

        $post->update($data);

        return response()->json($post, 200);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
