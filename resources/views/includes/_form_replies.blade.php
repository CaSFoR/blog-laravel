{{-- if user Auth --}}

<div class="bg-white rounded-3 shadow-sm p-4 mb-4 mt-4" x-show="openReplyBox">

  <div class="d-flex">
    <div class="flex-grow-1">

      <div class="form-floating mb-3">
        <textarea class="form-control w-100" placeholder="Write Your reply" id="my-reply" style="height:7rem;"
          name="reply" wire:model.defer="reply"></textarea>
        <label for="my-reply">{{ __('Write your reply') }}</label>
      </div>
      <div class="justify-content-start gap-2">
        <button class="btn btn-sm btn-outline-success text-uppercase" wire:click='storeReply({{ $comment->id }})'>
          {{__('Reply')}}
        </button>

      </div>

    </div>
  </div>
</div>
{{-- end reply Div --}}