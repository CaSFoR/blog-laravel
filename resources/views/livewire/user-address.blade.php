<div>
    <div class="card mb-3 shadow">
        <div class="card-header bg-white">
            {{ __('Address') }}
        </div>
        <div class="card-body">
            <form wire:submit.prevent='userAddress'>
                <div class="form-group">
                    <label for="address" class="form-label">{{ __('City') }}</label>
                    <input type="text" id="address" class="form-control @error('address') is-invalid  @enderror"
                        placeholder="{{ __('City') }}" name="address" wire:model.defer='address'>
                    @error('address')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100 text-white">{{ __('Update Address') }} <span
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