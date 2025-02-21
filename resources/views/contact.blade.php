@extends('layouts.app')
@section('title', __('Contact me'))
@section('content')

<div class="container col-lg-4 mt-4 mb-4">

  <h4>{{ __("Please fill field") }}</h4>

  @if (date('D') == 'Fri')
  @include('_partials._closed_alert')
  @else
  <h6> {{ __("We are ready to get your message") }}</h6>
  @endif

  @if (session()->has('success'))
  <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
    x-init="setTimeout(() => flashMessage = false, 3000)">
    <h6>{{ session('success') }}</h6>
  </div>
  @endif

  @if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
  </ul>
  @endif

  <form action="{{ route('contact.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">{{ __('Name') }}</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Your Name') }}">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">{{ __('Email') }}</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('Your Email') }}">
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">{{ __('Message') }}</label>
      <textarea name="message" id="message" cols="30" rows="10" placeholder="{{ __('Your Message') }}"
        class="form-control"></textarea>
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary btn-block form-control">{{ __("Send") }}</button>
    </div>

  </form>
</div>

@endsection