<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;

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


  public function showApi(Post $post)
  {
    $post = $post->load("user");

    return $post->toJson();
  }


  public function create()
  {
    return view("post.create",["users"=> User::all()]);
  }


  public function store(StorePostRequest $request)
  {
    $image = $request->file('image')->store('images',['disk' => "public"]);
    $data = $request->validated();

    $data["image"] = $image;

    Post::create($data);

    return redirect()->route("posts.index");
  }


  public function edit($id)
  {
    $post = Post::find($id);
    $users = User::all();
    return view("post.edit",["post"=>$post,"users"=>$users]);
  }


  public function update(Post $post,UpdatePostRequest $request)
  {
    $data = $request->validated();

    if($request->hasFile("image")){

      Storage::disk("public")->delete($post->image);

      $image = $request->file('image')->store('images',['disk' => "public"]);
      $data["image"] = $image;

    }
    $post->update($data);
    return redirect()->route("posts.index");
  }

  public function destroy(Post $post)
  {

    Storage::disk("public")->delete($post->image);

    $post->delete();

    return redirect()->route("posts.index");

  }

  public function restore($id, Request $request)
  {
    $post = Post::withTrashed()->find($id);
    $post->restore();
    return redirect()->route("posts.index");
  }

  public function removePosts()
  {
    PruneOldPostsJob::dispatch();
  }
}
