<div>
    <div class="card mb-3 shadow">
        <div class="card-header bg-white">
            {{ __('About Me') }}
        </div>
        <div class="card-body">
            <form wire:submit.prevent='aboutMe'>
                <div class="form-group">
                    <label for="aboutMe" class="form-label">{{ __('About Me Description') }}</label>
                    <textarea class="form-control w-100 @error('aboutMe') is-invalid  @enderror"
                        placeholder="{{ __('About Me Description') }}" id="aboutMe" style="height:7rem;" name="aboutMe"
                        wire:model.defer='aboutMe'></textarea>

                    @error('aboutMe')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100 text-white">{{ __('Save') }} <span
                            wire:loading>...</span></button>
                </div>
            </form>
            @if (session()->has('message'))
            <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
                x-init="setTimeout(() => flashMessage = false, 2250)">
                <h6>{{ Session('message') }}</h6>
            </div>
            @endif

        </div>
    </div>
</div>