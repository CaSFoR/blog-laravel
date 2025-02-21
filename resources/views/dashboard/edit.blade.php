@extends('layouts.app')

@section('title',__('Edit Account'))

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">

      @livewire('update-user-info',['username' => $user->username,'email'=>$user->email])
      @livewire('update-user-password')
      <div class="card mb-3 shadow">
        <div class="card-header bg-white">
          {{ __('Delete Account') }}
        </div>
        <div class="card-body">
          <form action="{{ route('destroyProfile') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger w-100" onclick="return confirm('Are you sure ?')">Delete Account</button>
          </form>
        </div>
      </div>

    </div>

    <div class="col-md-6">
      @include('includes.user-avatar')
      @livewire('user-address',['address' => $user->address])
      @livewire('about-me',['aboutMe' => $user->about_me])
    </div>

  </div>

</div>

@endsection