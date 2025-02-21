@extends('master-dashboard.index')
@section('title', __('Edit Role'))
@section('content-admin')


<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('Create Role') }}</div>

      <div class="card-body">
        <form method="POST" action="{{ route('role.update',$role->id) }}">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ $role->name }}" required autofocus>

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
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>

  </div>

</div>

@endsection