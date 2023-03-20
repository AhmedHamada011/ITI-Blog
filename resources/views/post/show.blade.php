@extends("layouts.app")



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



  <livewire:add-comment :post="$post"/>
  <livewire:comments :post="$post"/>





@endsection
