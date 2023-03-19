
<form action="{{$link}}" class="d-inline" method="{{$method === "get" ? "get": "post"}}">
  @csrf
  @method($method)

  <button type={{$type}}  class="btn btn-{{$class}}" data-bs-toggle={{$modal}}
  data-bs-target={{$target}}>{{$slot}}</button>
</form>

