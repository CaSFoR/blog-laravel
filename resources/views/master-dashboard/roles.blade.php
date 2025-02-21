@extends('master-dashboard.index')
@section('title', __('Roles'))
@section('content-admin')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-black text-white">{{ __('Create Role') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('role.store') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0 mt-2">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Create') }}
                </button>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>

  </div>

  <table class="table table-hover mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roles as $role)
      <tr>
        <th scope="row">{{ $role->id }}</th>
        <td>{{ $role->name }}</td>
        <td class="d-flex justify-content-center gap-2 align-items-center">
          <a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary">Edit</a>
          <form action="{{ route('role.destroy', $role->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
              onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection