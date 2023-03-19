@extends("layout.app")



@section("content")

  <div class="card mt-3">
    <div class="card-header">
      Post info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title: {{$post["title"]}}</h5>
      <p class="card-text">Description: {{$post["description"]}}</p>
      <p class="card-text text-muted fs-6">{{$post->human_readable_date}}</p>
    </div>
  </div>


  <div class="card mt-3">
    <div class="card-header">
      Post Creator info
    </div>
    <div class="card-body">
      <h5 class="card-title">name: {{$post->user->name}}</h5>
      <p class="card-text">email: {{$post->user->email}}</p>
    </div>
  </div>


  <div class="card mt-3">
    <div class="card-header">
      add new comment
    </div>
    <div class="card-body">
      <form action="{{route('comments.store')}}" method="post">
        @csrf
        <input type="hidden" name="post" value="{{$post["id"]}}">
        <div class="mb-3">
          <label for="comment" class="form-label">Comment</label>
          <textarea class="form-control" name="comment" id="comment"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

      </form>
    </div>
  </div>


  <div class="card mt-3">
    <div class="card-header">
      Comments
    </div>
    <div class="card-body">
      <div class="comment">
        @foreach($comments as $comment)
          <div class="comments">
            <p class="card-text">{{$comment["comment"]}}</p>
          </div>
          <hr>
        @endforeach
      </div>
    </div>
  </div>



@endsection
