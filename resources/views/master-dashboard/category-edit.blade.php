@extends('master-dashboard.index')
@section('title', __('Edit Category'))

@section('content-admin')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Create Role') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('category.update',$category->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

              <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                  value="{{  $category->title }}" required autofocus>

                @error('title')
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



</div>
@endsection