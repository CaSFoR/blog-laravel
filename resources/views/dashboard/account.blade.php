@extends('layouts.app')

@section('title',__('Dashboard'))

@section('content')


<section class="h-100 gradient-custom-2 mt-4">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-3 d-flex flex-column" style="width: 191px; height: 180px;">
              @php
              $avatarUrl = Auth::user()->avatar ? asset(Auth::user()->avatar) :
              'https://static.vecteezy.com/system/resources/previews/018/765/757/original/user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-sign-business-concept-vector.jpg';
              @endphp

              <img src="{{ $avatarUrl }}" alt="Avatar"
                class="img-fluid img-thumbnail mb-2 object-fit-contain overflow-hidden">

              @if ($user->id === Auth::user()->id)
              <a href="{{ route('editInfo') }}" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1; color:#FFF;">
                {{ __('Edit') }}
              </a>

              @endif

            </div>

            <div class="ms-3" style="margin-top: 40px;">
              <div class="d-flex flex-column">
                <h5 class="mb-0">&#64;{{ $user->username }}</h5>
                <small class="text-light">{{ $user->role->name }}</small>
              </div>
              <p class="mt-5"> <i class="fas fa-map-marker-alt"></i> {{ $user->address ? $user->address : 'Unknown' }}
              </p>
            </div>
          </div>


          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">

              @if ($user->isAuther())
              <div>
                <p class="mb-1 h5">{{ $user->articles->count() }}</p>
                <p class="small text-muted mb-0">{{ __('Articles') }}</p>
              </div>
              @endif
              <div class="px-3">
                <p class="mb-1 h5">{{ $user->comments->count() }}</p>
                <p class="small text-muted mb-0">{{ __('Comments') }}</p>
              </div>
              <div>
                <p class="mb-1 h5">{{ $user->replies->count() }}</p>
                <p class="small text-muted mb-0">{{ __('Replies') }}</p>
              </div>
            </div>
          </div>

          <div class="card-body p-4 text-black">
            @if (!auth()->user()->isActive())
            <div class="mb-3">
              <div class="alert alert-danger" role="alert">
                Your account is currently inactive. Please contact support for assistance.
              </div>
            </div>
            @endif
            
            @if($user->about_me)
            <div class="mb-5">
              <p class="lead fw-normal mb-1">{{ __('About me') }}</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">

                  {!! nl2br(e($user->about_me)) !!}
                  
                </p>
              </div>
           

            </div>
             @endif

            @if (auth()->user()->isAuther())
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">{{ __('Articles') }}</p>
              <p class="mb-0"><a href="{{ route('my-articles') }}" class="text-muted">{{ __('All My Articles') }}</a>
              </p>
            </div>
            <div class="d-flex row ">
              @forelse ($userArticles as $userArticle)
              <div class="col-6 d-flex  justify-content-center overflow-hidden">
                <div class="mb-2" style="height: 300px;">
                  <a href="{{ route('articles.show',$userArticle->slug) }}">
                    <img src="{{ url('/').'/' }}{{ $userArticle->image_path  }}" alt="article image"
                      class="img-fluid  rounded-3" style="object-fit: cover;">
                      
                  </a>
                </div>
              </div>

              @empty
              <div>
                {{ __('No Articles') }}
              </div>
              @endforelse

            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection