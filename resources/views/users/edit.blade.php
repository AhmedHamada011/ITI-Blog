@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">edit profile</div>

          <div class="card-body">
            <form method="POST" action="{{ route('users.update',auth()->user()->id) }}" enctype="multipart/form-data">
              @csrf
              @method("put")
              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                <div class="col-md-6">
                  <input id="email" type="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                </div>
              </div>

              <img src="{{$user->getFirstMediaUrl('profile_images', 'thumb')}}" width="120px">
              <div class="row mb-3">
                <label for="profile-image" class="col-md-4 col-form-label text-md-end">profile image</label>

                <div class="col-md-6">
                  <input id="profile-image" type="file" class="form-control" name="profile_image">
                </div>
              </div>







              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                     update
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
