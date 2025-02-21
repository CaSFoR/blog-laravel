@extends('layouts.app')

@section('title',__('Create Article'))

@section('content')

<div class="container d-flex justify-content-center mt-4 mb-4">

  <div class="col-8">
    @include('errors._errors')
    <h2>{{ __('Create article') }}</h2>

    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
      @include('articles._form', ['submitText'=> __('Create')])
    </form>
  </div>
</div>



@endsection