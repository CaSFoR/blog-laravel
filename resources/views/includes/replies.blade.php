<div x-data="{ openReplies: false }" class="mt-2">

  <span class="text-primary">
    @if ($comment->replies()->count() > 0)

    <button type="button" class="btn btn-sm link-primary mx-3 reply_comment" x-on:click="openReplies = ! openReplies">
      {{ __('Replies') }}
      {{ $comment->replies()->count() }}
    </button>
    @endif


  </span>

  @foreach ($comment->replies as $reply)

  @if ($comment->id == $reply->comment_id && $comment->user_id == $reply->user_id )
  <div class="comment-replies mt-4 bg-dark p-3 rounded ms-5" style="--bs-bg-opacity:.020;"
    x-data="{ openReplyDiv: false }" x-on:click.outside="openReplyDiv = false " x-show="openReplies">
    <div class="d-flex py-2">
      <div class="flex-grow-1 ms-3">
        <div class="mb-1 d-flex justify-content-between">
          <div>
            <a href="#" class="fw-bold link-dark pe-1">{{ $reply->user->name }}</a>
            <span class="text-muted text-nowrap">
              {{ $reply->created_at->diffForHumans() }}
            </span>
          </div>
          <a class="align-items-start" href="#reply-{{$reply->id}}">{{$reply->id}}#</a>
        </div>
        <div class="mb-2">{{ $reply->reply }}</div>
        <div class=" align-items-center">

          {{-- if user Auth --}}
          @auth
          <div class="row">

            <div x-data="{ openReplyBox: false }">
              @if (Auth::id() == $comment->user_id && auth()->user()->isActive())

              <form wire:submit.prevent='deleteReply({{ $reply->id }})' class="d-inline">
                <button type="submit" class="btn btn-sm link-danger"
                  onclick="return confirm('{{ __('Are you sure?') }}')">
                  <i class="fa fa-trash" aria-hidden="true"></i>

                </button>
              </form>

              @endif
              @if (auth()->user()->isActive())
              <button type="button" class="btn btn-sm" x-on:click='openReplyBox = ! openReplyBox'>
                <i class="fa fa-reply" aria-hidden="true"></i>
              </button>

              @include('includes._form_replies')
              @endif


            </div>

          </div>
          @else
          <button class="btn btn-sm" onclick="notAuth(this)">
            <i class="fa fa-reply" aria-hidden="true"></i>
          </button>
          @endauth

          {{-- end reply Div --}}


        </div>
      </div>
    </div>
  </div>


  @elseif ($comment->id == $reply->comment_id && $comment->user_id != $reply->user_id )
  <div class="comment-replies mt-4 bg-dark p-3 rounded me-5" style="--bs-bg-opacity:.025;"
    x-data="{ openReplyDiv: false }" x-on:click.outside="openReplyDiv = false " x-show="openReplies">
    <div class="d-flex py-2">
      <div class="flex-grow-1 ms-3">
        <div class="mb-1 d-flex justify-content-between">
          <div>
            <a href="#" class="fw-bold link-dark pe-1">{{ $reply->user->name }}</a>
            <span class="text-muted text-nowrap">
              {{ $reply->created_at->diffForHumans() }}
            </span>
          </div>
          <a class="align-items-start" href="#reply-{{$reply->id}}">{{$reply->id}}#</a>
        </div>
        <div class="mb-2">{{ $reply->reply }}</div>
        <div class=" align-items-center">

          {{-- if user Auth --}}
          @auth
          @if (auth()->user()->isActive())
          <div x-data="{ openReplyBox: false }">
            <button type="button" class="btn btn-sm" x-on:click='openReplyBox = ! openReplyBox'>
              <i class="fa fa-reply" aria-hidden="true"></i>
            </button>

            @include('includes._form_replies')


          </div>
          @endif
          @else
          <button class="btn btn-sm" onclick="notAuth(this)">
            <i class="fa fa-reply" aria-hidden="true"></i>
          </button>
          @endauth

          {{-- end reply Div --}}


        </div>
      </div>
    </div>
  </div>

  @endif


  @endforeach
</div>