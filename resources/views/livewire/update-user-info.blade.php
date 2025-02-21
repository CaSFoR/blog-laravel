<div>

    <div class="card mb-3 shadow">
        <div class="card-header bg-white">
            {{ __('Account Information') }}
        </div>
        <div class="card-body">
            <form wire:submit.prevent='updateUserInfo'>
                <div class="form-group">
                    <label for="username" class="form-label">{{ __('Username') }}</label>
                    <input type="text" id="username" class="form-control @error('username') is-invalid  @enderror"
                        placeholder="{{ __('Username') }}" name="username" wire:model.defer='username'>
                    @error('username')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid  @enderror"
                        placeholder="{{ __('Email') }}" name="email" wire:model.defer='email'>
                    @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100 text-white">{{ __('Update My Account') }} <span
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