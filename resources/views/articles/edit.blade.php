@extends('layouts.app')

@section('title',__('Edit Article'))

@section('content')

<div class="container d-flex justify-content-center mt-4 mb-4">

  <div class="col-8">
    @include('errors._errors')
    <h2 class="balanced">{{ __('Edit article') }}: {{ $article->title }}</h2>
    <form action="{{ route('articles.update',$article) }}" method="post" enctype="multipart/form-data">
      @method('PATCH')
      @include('articles._form',['submitText'=> __('Edit')])
    </form>
  </div>
</div>



@endsection