@extends("layout.app")



@section("content")

  <div class="card mt-3">
    <div class="card-header">
      Post info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title: {{$post["title"]}}</h5>
      <p class="card-text">Description: {{$post["description"]}}</p>
    </div>
  </div>


  <div class="card mt-3">
    <div class="card-header">
      Post Creator info
    </div>
    <div class="card-body">
      <h5 class="card-title">name: {{$creator["name"]}}</h5>
      <p class="card-text">email: {{$creator["email"]}}</p>
    </div>
  </div>

@endsection
