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
                    <td>{{$post->human_readable_date}}</td>
                    <td>
                      <x-button type="submit" class="secondary" method="get" :link="route('posts.show',$post['id'])" >view</x-button>
                      <x-button type="submit" class="primary" method="get" :link="route('posts.edit',$post['id'])">edit</x-button>
                      @if($post->trashed())
                        <x-button type="submit" class="danger" method="post" :link="route('posts.restore',$post['id'])">restore</x-button>
                      @else
                        <x-button type="button" class="danger deletePost" method="delete" :link="route('posts.delete',$post['id'])" modal="modal" target="#exampleModal">delete</x-button>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

  // var deleteBtnModal = document.querySelector("#delete");
  //
  // deleteBtn.addEventListener("click",(e)=>{
  //
  //     var that = e.target;
  //
  //     that.closest("form").submit();
  // });

</script>

@endsection
