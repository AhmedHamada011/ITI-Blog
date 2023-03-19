<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class PostController extends Controller
{


  public function index()
    {
        $posts = Post::withTrashed()->paginate(10);
        return view("post.index",["posts"=>$posts]);
    }


    public function show($id)
    {
      $post = Post::find($id);

      $comments = $post->comments;

      return view("post.show",["post"=>$post,"comments"=>$comments]);

    }


  public function create()
  {
    $users = User::all();
    return view("post.create",["users"=>$users]);
  }


  public function store(Request $request)
  {
    Post::create($request->all());

    return redirect()->route("posts.index");
  }


  public function edit($id)
  {
    $post = Post::find($id);
    $users = User::all();
    return view("post.edit",["post"=>$post,"users"=>$users]);
  }


  public function update(Post $post,Request $request)
  {
    $post->update($request->all());

    return redirect()->route("posts.index");
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return redirect()->route("posts.index");

  }

  public function restore($id, Request $request)
  {
    $post = Post::withTrashed()->find($id);
    $post->restore();
    return redirect()->route("posts.index");

  }
}
