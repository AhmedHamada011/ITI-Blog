<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

  public function index()
  {
    $posts = Post::with('user')->paginate(5);

    return PostResource::collection($posts);
  }

  public function show(Post $post)
  {
    return new PostResource($post);
  }

  public function store(Request $request)
  {
    $post = Post::create($request->all());

    return new PostResource($post);
  }
}
