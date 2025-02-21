<div>
    <div class="card mb-3 shadow">
        <div class="card-header bg-white">
            {{ __('Avatar') }}
        </div>
        <div class="card-body">
            <div class="mb-5">
                <form wire:submit.prevent="saveAvatar">
                    <div class="form-group">
                        <div class="mx-auto mb-5" style="height: 200px; width: 200px;">
                            <label for="file-upload" style="cursor: pointer ; height: 200px; width: 200px;">
                                <div class="rounded-circle border avatar-auto bg-white border-primary"
                                    style="background-image: url( @if ($avatar){{ $avatar->temporaryUrl() }} @elseif($userAvatar) 
                                    {{ $userAvatar }} @endif); 
                                height: 100%; width: 100%; background-size: cover; background-position: center; object-fit:contain; background-repeat:no-repeat">
                                </div>
                            </label>
                        </div>
                        <input type="file" accept="image/*" name="avatar" wire:model='avatar' id="file-upload"
                            class="form-control " hidden>

                        <div class="d-flex justify-content-center align-items-center ">

                            <label for="file-upload" class="custom-file-upload ">
                                <button type="submit" class="btn border-0">
                                    <i class="fa fa-upload"></i>
                                    {{ __('Upload Avatar') }}
                                    <span class="spinner" wire:loading wire:target='saveAvatar'></span>
                                </button>

                            </label>

                        </div>


                        @error('avatar') <span class="text-danger d-flex justify-content-center mt-2">{{ $message
                            }}</span>
                        @enderror
                    </div>

                </form>
            </div>


        </div>
    </div>

</div>