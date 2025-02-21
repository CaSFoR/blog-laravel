@extends('layouts.app')

@section('title',__('Author Profile'))

@section('content')


<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 191px; height: 100%;">
              <img src='@if (!$author->avatar) https://static.vecteezy.com/system/resources/previews/018/765/757/original/user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-sign-business-concept-vector.jpg
              @else {{ asset($author->avatar) }}
              
              @endif'

              alt="Avatar"
              class="img-fluid img-thumbnail mt-4 mb-2 object-fit-contain overflow-hidden"
              style="width: 191px; z-index: 1 ">

            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>{{ $author->username }}</h5>
              <p>{{ $author->address }}</p>
            </div>
          </div>

          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5">{{ $author->articles->count() }}</p>
                <p class="small text-muted mb-0">{{ __('Articles') }}</p>
              </div>
            </div>
          </div>

          <div class="card-body p-4 text-black">
            @if ($author->about_me)
            <div class="mb-5">
              <p class="lead fw-normal mb-1">{{ __('About me') }}</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1"> {!! nl2br(e($author->about_me)) !!}</p>
              </div>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">{{ __('Articles') }}</p>
              <p class="mb-0"><a href="{{ route('author-articles',$author->username) }}" class="text-muted">{{
                  __('All Articles') }}</a>
              </p>
            </div>
            <div class="d-flex row">
              @forelse ($authorArticles as $authorArticle)

              <div class="col-6">
                <div class="mb-2">
                  <a href="{{ route('articles.show',$authorArticle->slug) }}">
                    <img src="{{ url('/').'/' }}{{ $authorArticle->image_path  }}" alt="article image"
                      class="w-100 rounded-3">
                  </a>
                </div>
              </div>

              @empty
              <div>
                {{ __('No Articles') }}
              </div>
              @endforelse

            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection