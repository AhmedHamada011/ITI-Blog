<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function edit()
  {
    $user = auth()->user();
    return view("users.edit",["user"=>$user]);
  }

  /**
   * @param User $user
   * @param UpdateUserRequest $request
   * @return void
   */
  public function update(User $cuser, UpdateUserRequest $request)
  {

//    $image = $request->file('profile_image')->store('profile_images',['disk' => "public"]);
    $data = $request->validated();

    $cuser->addMediaFromRequest('profile_image')->toMediaCollection('profile_images','profile_images');

    if(isset($data["password"])){
      $post = $cuser->update([
          'name' => $data["name"],
          'email' => $data["email"],
          'password'=> Hash::make($data['password']),
      ]);
      return redirect()->route('posts.index');
    }

    $post = $cuser->update([
      'name' => $data["name"],
      'email' => $data["email"],
    ]);
    return redirect()->route('posts.index');

  }
}
