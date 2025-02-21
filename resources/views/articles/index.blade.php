@extends('layouts.app')

@section('title',__('Articls Page'))

@section('content')
<div class="container-fluid">
  <div class="container mt-4 py-4">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="display-5 mb-4 mb-md-5 text-center">Articles</h2>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @include('articles._articles_card')
    </div>
  </div>



  <div class="d-flex justify-content-center mb-4 me-lg-auto">
    @if ($articles->previousPageUrl())
    <a href="{{ $articles->previousPageUrl() }}" class="btn btn-outline-primary rounded-pill btn me-lg-2">
      <i class="fas fa-arrow-left"></i> {{ __('Previous') }}
    </a>
    @endif

    @if ($articles->nextPageUrl())
    <a href="{{ $articles->nextPageUrl() }}" class="btn btn-outline-primary rounded-pill btn">
      {{ __('Next') }} <i class="fas fa-arrow-right"></i>
    </a>
    @endif
  </div>

</div>

@endsection