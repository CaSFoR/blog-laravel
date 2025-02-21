<div>
<div class="card mb-3 shadow">
  <div class="card-header bg-white">
    {{ __('Avatar') }}
  </div>
  <div class="card-body">
    <div class="mb-5">
      <form id="avatarForm" action="{{ route('upload-avatar') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <div class="mx-auto mb-5" style="height: 200px; width: 200px;">
            <label for="avatarInput" style="cursor: pointer; height: 200px; width: 200px;">
        @if (Auth::user()->avatar)
              <div class="rounded-circle border avatar-auto bg-white border-primary"
                style="background-image: url({{ asset(Auth::user()->avatar) }}); height: 100%; width: 100%; background-size: cover; background-position: center; object-fit: contain; background-repeat: no-repeat">
              </div>
              @else
              <div class="rounded-circle border avatar-auto bg-white border-primary"
                style="height: 100%; width: 100%; background-size: cover; background-position: center; object-fit: contain; background-repeat: no-repeat">
                @endif
            </label>
          </div>
          <input type="file" accept="image/*" name="avatar" id="avatarInput" class="form-control" hidden>

          <div class="d-flex justify-content-center align-items-center">
            <label for="avatarInput" class="custom-file-upload">
              <button type="submit" class="btn border-0" id="uploadButton">
                <i class="fa fa-upload"></i>
                {{ __('Upload Avatar') }}
                <span class="spinner" id="uploadSpinner" style="display: none;"></span>
              </button>
            </label>
          </div>
          <span id="avatarError" class="text-danger d-flex justify-content-center mt-2"></span>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#avatarInput').change(function(e) {
          var file = e.target.files[0];
          var reader = new FileReader();

          reader.onload = function(e) {
              $('.avatar-auto').css('background-image', 'url(' + e.target.result + ')');
          }

          reader.readAsDataURL(file);
      });

  });
</script>
@endsection