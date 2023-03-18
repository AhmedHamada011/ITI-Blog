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
                    <td>{{$post["created_at"]}}</td>
                    <td>
                      <x-button type="secondary" :link="route('posts.show',$post['id'])" >view</x-button>
                      <x-button type="primary">edit</x-button>
                      <x-button type="danger">delete</x-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
