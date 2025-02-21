@extends('layouts.app')

@section('title', __('Inactive Account'))

@section('content')
<div class="container-fluid ">
  <div class="row">
    <div class="col-lg-12">
      <div class="container mt-3 py-4">
        <div class="row justify-content-md-center">
          <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
            <h2 class="display-5 mb-4 mb-md-5 text-center text-danger">{{ __('Inactive Account') }}</h2>
            <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
          </div>
        </div>
      </div>
      <div class="container mb-4">
        <div class="row">
          <div class="col text-center">
            <a href="{{ route('contact.index') }}" class="btn bsb-btn-2xl btn-primary rounded-pill mt-5 mt-xl-10">{{
              __('Contact Us') }}</a>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>


@endsection