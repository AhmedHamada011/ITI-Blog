@extends("layouts.app")

@section("content")




  <form class="mt-5" action="{{route("posts.store")}}" method="post">
    @csrf
    @method("post")
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="description"></textarea>
    </div>


    <div class="mb-3">
      <label for="user" class="form-label">Posted By</label>
      <select class="form-control" name="user_id" id="user">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>



@endsection
