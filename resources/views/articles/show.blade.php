@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="container col-12  mt-4 mb-5" x-data='{notAuth:false}'>

  <div class="col card bg-white rounded-3 shadow-sm p-4 mb-3">
    <span>
      @if (Auth::id() == $article->user_id && auth()->user()->isActive()) 
      <a href="{{ route('articles.edit', $article->slug) }}" class="btn btn-sm btn-warning"><i
          class="fa fa-edit"></i></a>
      @endif
    </span>
    
    <h2  class="text-center mt-3">{{ $article->title }} </h2>
    <h6 class="text-center"><b>{{ __('Author') }}:</b>
      <a href="{{  route('author-profile', $article->user->username )  }}" class="text-decoration-none">
        &#64;{{ $article->user->username}}
      </a>
    </h6>
    <div class="text-muted m-2 text-center">
      <div>
        <i class="fa-regular fa-calendar-days"></i><span class="ms-2"> {{ date_format($article->created_at,"Y, F d")
          }}</span>
      </div>
    </div>
    <div class="col text-center mt-3">
      <img src="{{ env('APP_URL'). '/' . $article->image_path }}" alt="image blog" class="img-fluid mx-auto d-block">
    </div>
    <div class="col-12 mt-5">
      <div class="d-flex">
        <div class="d-flex align-items-center">
          <strong class="ms-2">{{ __('category') }}:</strong>
          @foreach ($article->categories()->get() as $category)
          <span class="d-inline-block ms-3 bg-light-subtle p-2">{{ __($category->title) }}</span>
          @endforeach
        </div>
      </div>
      <div class="card-body">
        <p class="card-text">
          {!! nl2br(e($article->content)) !!}
        </p>
      </div>
      <div class="card-footer text-muted bg-light-subtle">
        <i class="fa-regular fa-pen-to-square"></i><span class="ms-2">{{ $article->updated_at->diffForHumans() }}</span>
      </div>
    </div>
  </div>


  <hr>

  @include('errors._errors')

  @livewire('add-comments', ['article_id' => $article->id])

  @livewire('comments', ['article_id' => $article->id])



  {{-- if user not Auth --}}
  <div class="mt-4" id="not-Auth" style="display: none">
    <div>
      <a href="{{ route('login') }}">{{ __('You have login to first') }}</a>
    </div>
  </div>
  {{-- end user not Auth Div --}}






</div>

@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
  function commentDiv(caller){
    $('.comment-div').insertAfter(caller);
     $('.comment-div').show();
}

function closeCommentDiv(caller){
  $('#my-comment').val('');
  $('.comment-div').hide();
}


  function replyDiv(caller,comment_id){
       console.log(comment_id);
       $('#comment_id').val(comment_id);
       $('.reply-Div').insertAfter(caller);
       $('.reply-Div').show();
  }

  function closeReplyDiv(caller){
    $('#my-reply').val('');
    $('.reply-Div').hide();

  }
  
  function showReplies(caller){
    $('#comment-replies').toggle();
  }

  function notAuth(caller){
       $('#not-Auth').insertAfter(caller);
       $('#not-Auth').show();
  }



</script>

@endsection