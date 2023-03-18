<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ["id"=>1,"title"=>"laravel","posted_by"=>"ahmed","created_at"=>"2023-04-05"],

            ["id"=>2,"title"=>"php","posted_by"=>"mohammed","created_at"=>"2023-04-07"],

            ["id"=>3,"title"=>"javascript","posted_by"=>"ali","created_at"=>"2023-04-08"],

        ];

        return view("post.index",["posts"=>$posts]);
    }


    public function show()
    {
      $post = [
        "id"=>1,
        "title"=>"laravel",
        "description" => "Hello from description",
        "posted_by"=>"ahmed",
        "created_at"=>"2023-04-05"
      ];

      $creator = [
        "name" => "Ahmed",
        "email" =>"ahmed@test.com"
      ];

      return view("post.show",["post"=>$post,"creator"=>$creator]);

    }


  public function create()
  {
    return view("post.create");
  }


  public function store(Request $request)
  {
    return redirect()->route("posts.index");
  }
}
