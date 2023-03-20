@extends("layouts.app")



@section("content")

  <div class="card mt-3">
    <div class="card-header">
      Post info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title: {{$post["title"]}}</h5>
      <p class="card-text">Description: {{$post["description"]}}</p>
      <img src="{{$post["image"]}}" style="width: 250px" alt="">

      <p class="mt-2">
        Tags: @foreach($post->tags as $tag) <span class="badge rounded-pill text-bg-warning">{{$tag->name}}</span> @endforeach
      </p>
      <p class="card-text text-muted mt-2 fs-6">{{$post->human_readable_date}}</p>
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



  <livewire:add-comment :post="$post"/>
  <livewire:comments :post="$post"/>





@endsection
