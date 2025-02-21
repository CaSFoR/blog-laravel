@extends('layouts.app')

@section('title',__('Articls Page'))

@section('content')
<div class="container-fluid">
  <h3 class="text-primary-emphasis text-center mt-4">{{ __('All Articles') }}</h3>
  @include('articles._articles_card')
</div>

@endsection