@extends("layout.app")

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

    <button type="submit" class="btn btn-primary">Update</button>
  </form>



@endsection
