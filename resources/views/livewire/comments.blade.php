<div>
    @if (session()->has('message'))
    <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
        x-init="setTimeout(() => flashMessage = false, 2250)">
        <h6>{{ Session('message') }}</h6>
    </div>
    @endif


    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="mt-5">
        <h3><span>{{$comments->count() }}</span> {{ __('Comments') }} </h3>
    </div>

    @foreach ($comments as $comment)
    <div class="commnet-div bg-white rounded-3 shadow-sm p-4 mb-3">


        <div class="py-3">
            <div class="d-flex comment">
                <div class="flex-grow-1 ms-3">
                    <div class="mb-1 d-flex justify-content-between">
                        <div>
                            <a class="fw-bold link-dark me-1 text-decoration-none">{{ $comment->user->name }}</a>
                            <span class="text-muted text-nowrap">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <a class="align-items-start CommentID" href="#comment-{{$comment->id}}"
                            data-id='{{$comment->id }}' id='CommentID'>{{
                            $comment->id }}#</a>

                    </div>
                    <div class="mb-2"> {{ $comment->comment }}</div>




                    <div class="align-items-center mb-2">
                        @auth

                        @if (Auth::id() == $comment->user_id && auth()->user()->isActive())
                        <form wire:submit.prevent='deleteComment({{ $comment->id }})' class="d-inline">
                            <button type="submit" class="btn btn-sm link-danger"
                                onclick="return confirm('{{ __('Are you sure?') }}')">
                                <i class="fa fa-trash" aria-hidden="true"></i>

                            </button>
                        </form>

                        <div x-data="{ openReplyBox: false }" class="d-inline">
                            <button type="button" class="btn btn-sm link-primary mx-3 reply_comment"
                                x-on:click='openReplyBox = ! openReplyBox'>
                                <i class="fa fa-reply" aria-hidden="true"></i>

                            </button>
                            @include('includes._form_replies')

                        </div>
                        @else
                        @if (auth()->user()->isActive())


                        <div x-data="{ openReplyBox: false }" class="d-inline">
                            <button type="button" class="btn btn-sm link-primary mx-3 reply_comment"
                                x-on:click='openReplyBox = ! openReplyBox'>
                                <i class="fa fa-reply" aria-hidden="true"></i>

                            </button>
                            @include('includes._form_replies')

                        </div>
                        @endif
                        @endif

                        @else
                        <button type="button" class="btn btn-sm link-primary mx-3" onclick="notAuth(this)">
                            <i class="fa fa-reply" aria-hidden="true"></i>

                        </button>

                        @endauth


                        @include('includes/replies')


                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>