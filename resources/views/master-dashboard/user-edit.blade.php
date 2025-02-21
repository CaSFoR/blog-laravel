@extends('master-dashboard.index')
@section('title', __('Edit User'))

@section('content-admin')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Edit User
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('user.update',$user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <a href="{{ $user->avatar ? asset($user->avatar) : '#' }}">
                <img
                  src="{{ $user->avatar ? asset($user->avatar) : 'https://static.vecteezy.com/system/resources/previews/018/765/757/original/user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-sign-business-concept-vector.jpg' }}"
                  alt="User Avatar" class="rounded-circle img-thumbnail" style="max-width: 150px; height: 150px;">
              </a>
            </div>

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="username">UserName</label>
              <input type="text" name="username" id="username"
                class="form-control  @error('username') is-invalid @enderror" value="{{ $user->username }}">
              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror"
                value="{{ $user->email }}">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-select">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                  {{ $role->name }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="is_active">Status</label>
              <select name="is_active" id="is_active" class="form-select">
                <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>
                  Inactive
                </option>
                <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>
                  Active
                </option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection