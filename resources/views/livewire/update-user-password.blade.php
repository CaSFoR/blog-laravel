<div>
    <div class="card mb-3 shadow">
        <div class="card-header bg-white">
            {{ __('Change Password') }}
        </div>
        <div class="card-body">

            <form wire:submit.prevent='updateUserPassword'>

                <div class="form-group">
                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input type="password" class=" form-control @error('current_password') is-invalid  @enderror"
                        id="current_password" name="current_password" placeholder="{{ __('Current Password') }}"
                        wire:model.defer='current_password'>
                    @error('current_password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group mt-2 mb-2">
                    <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                    <input type="password" class="form-control @error('new_password')is-invalid  @enderror"
                        id="new_password" name="new_password" placeholder="{{ __('New Password') }}"
                        wire:model.defer='new_password'>
                    @error('new_password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if (session()->has('messagePasswordnotCreect'))
                    <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
                        x-init="setTimeout(() => flashMessage = false, 2250)">
                        <h6>{{ Session('messagePassword') }}</h6>
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
                    <input type="password" class="form-control @error('new_password_confirmation')is-invalid  @enderror"
                        id="new_password_confirmation" name="new_password_confirmation"
                        placeholder="{{ __('Confirm New Password') }}" wire:model.defer='new_password_confirmation'>
                    @error('new_password_confirmation')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary w-100 text-white">
                        {{ __('Update Password') }} <span wire:loading>...</span>
                    </button>

                </div>
            </form>
            @if (session()->has('UpdatedPassword'))
            <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
                x-init="setTimeout(() => flashMessage = false, 2500)">
                <h6>{{ Session('UpdatedPassword') }}</h6>
            </div>
            @elseif (session()->has('error'))
            <div class="alert alert-danger mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
                x-init="setTimeout(() => flashMessage = false, 3800)">
                <h6>{{ Session('error') }}</h6>
            </div>


            @endif
        </div>
    </div>
</div>