<div>
   @error('comment')
   <div class="alert alert-danger">
      <h6>{{ $message }}</h6>
   </div>
   @enderror
   <div class="mt-3">
      @auth
      @if (auth()->user()->isActive())

      <button class="btn btn-primary" type="button" onclick="commentDiv(this)">
         {{ __('Comment') }}
      </button>

      <div class="comment-div bg-white rounded-3 shadow-sm p-4 mb-4 mt-4" style="display: none">

         <div class="d-flex">
            <div class="flex-grow-1">

               <div class="form-floating mb-3">

                  <textarea class="form-control w-100" placeholder="Write Your Comment" id="my-comment"
                     style="height:7rem;" name="comment" wire:model.defer='comment'></textarea>
                  <label for="my-comment">{{ __('Write Your Comment') }}</label>
               </div>
               <div class="hstack justify-content-start gap-2">
                  <button class="btn btn-sm btn-outline-success text-uppercase" type="button"
                     wire:click.prevent='store({{ $article_id }})'>{{ __('Save') }}</button>
                  <button class="btn btn-sm btn-outline-secondary text-uppercase" type="button"
                     onclick="closeCommentDiv(this)">{{ __('Cancel') }}</button>
               </div>
               </form>
            </div>
         </div>
      </div>
      @endif
      @else
      <button class="btn btn-primary" type="button" onclick="notAuth(this)">
         {{ __('Comment') }}
      </button>

      @endauth

   </div>

</div>