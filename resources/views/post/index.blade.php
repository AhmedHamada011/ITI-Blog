@extends("layout.app")

@section("content")
        <div class="create my-4">
            <a href="{{route("posts.create")}}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <th>{{$post["id"]}}</th>
                    <td>{{$post["title"]}}</td>
                    <td>{{$post["posted_by"]}}</td>
                    <td>{{$post["created_at"]->format("Y-m-d")}}</td>
                    <td>
                      <x-button type="submit" class="secondary" method="get" :link="route('posts.show',$post['id'])" >view</x-button>

                      <button type="button" class="btn btn-secondary viewAjax" data-bs-toggle="model" data-bs-target="#viewModal" data-id="{{$post["id"]}}">veiw ajax</button>
                      <x-button type="submit" class="primary" method="get" :link="route('posts.edit',$post['id'])">edit</x-button>
                      @if($post->trashed())
                        <x-button type="submit" class="danger" method="post" :link="route('posts.restore',$post['id'])">restore</x-button>
                      @else
                        <x-button type="button" class="danger deletePost" method="delete" :link="route('posts.delete',$post['id'])" modal="modal" target="#deleteModal">delete</x-button>
                      @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{$posts->links()}}
@endsection


@section("extra")
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          Are you sure want to remove this post ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="delete">delete</button>
        </div>
      </div>
    </div>
  </div>




  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="title" class="col-form-label">Title</label>
              <input type="text" class="form-control" id="title" value="">
            </div>
            <div class="mb-3">
              <label for="description" class="col-form-label">Description</label>
              <textarea class="form-control" id="description"></textarea>
            </div>

          <div class="mb-3">
            <label for="username" class="col-form-label">username</label>
            <input type="text" class="form-control" id="username" value="">
          </div>


          <div class="mb-3">
            <label for="email" class="col-form-label">email</label>
            <input type="text" class="form-control" id="email" value="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>



@endsection


@section("script")
<script>

  var deleteBtn = document.querySelectorAll(".deletePost");

  for(btn of deleteBtn){
    btn.addEventListener("click",function(event){
      event.preventDefault();
      var that = event.target;
      console.log(that)
      let deleteBtnModal = document.querySelector("#delete");

      deleteBtnModal.onclick = function(){
        that.closest("form").submit();
      }
    });
  }


  // ajax
  const myModal = new bootstrap.Modal(document.getElementById('viewModal'))

  let viewBtns = document.querySelectorAll(".viewAjax")

  for(btn of viewBtns){
    btn.addEventListener("click",function(){

      let xhttp = new XMLHttpRequest();
      let id = this.getAttribute("data-id");
      let url = "{{route("posts.showApi",':id')}}";
      url = url.replace(':id', id);

      xhttp.open("GET",url )

      xhttp.onload = function() {


        let postData = JSON.parse(this.responseText);

        console.log(postData);
        let title = document.getElementById("title");
        let description = document.getElementById("description");
        let username = document.getElementById("username");
        let email = document.getElementById("email");

        title.value =postData["title"];
        description.value = postData["description"];
        username.value =postData["user"]["name"];
        email.value =postData["user"]["email"];

        myModal.show();
      }
      xhttp.send();

    });
  }


</script>

@endsection
