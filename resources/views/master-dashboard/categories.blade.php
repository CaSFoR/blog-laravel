@extends('master-dashboard.index')
@section('title', __('Categories'))
@section('content-admin')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header  bg-black text-white">{{ __('Create Category') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('category.store') }}">
            @csrf

            <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

              <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                  value="{{ old('title') }}" required autofocus>

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
      @foreach ($categories as $category)
      <tr>
        <th scope="row">{{ $category->id }}</th>
        <td>{{ $category->title }}</td>
        <td class="d-flex justify-content-center gap-2 align-items-center">
          <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary">Edit</a>
          <form action="{{ route('category.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
              onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection