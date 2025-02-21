@csrf
<div class="form-group col mb-3">
  <label for="title" class="form-label balanced">{{ __('Title') }}</label>
  <input type="text" name="title" id="title" placeholder="{{ __('Article Title') }}" class="form-control "
    value="{{ old('title', $article->title ?? '') }}">
</div>

<div class="form-check-inline col   mb-3">
  <strong>{{ __('category') }} : </strong>
  @foreach ($categories as $id => $title)

  <label for="categories_{{ $id }}" class="form-check-label">{{ __($title) }}</label>
  <input type="checkbox" name="categories[]" id="categories_{{ $id }}" value="{{ $id }}" class="form-check-input mx-3"
    @if (isset($article) && in_array($id,$articleCategories)) checked @endif>

  @endforeach

</div>

<div class="form-group col mb-3">
  <label for="content" class="form-label">{{ __('Content') }}</label>
  <textarea name="content" id="content" class="form-control" placeholder="{{ __('Article Content') }}" cols="30"
    rows="10">
    {{ old('content', $article->content ?? '') }}
  </textarea>
</div>

<div class="form-group col mb-5">
  <label for="image" class="form-label">{{ __('Upload Image') }}</label>
  <input type="file" name="image" id="image" class="form-control" accept="image/*">
  @if (isset($article) && $article->image_path)
  <img src="{{ env('APP_URL').'/'. $article->image_path }}" class="mt-4 imagePreview" alt="Old Image"
    style="display: block; width: 200px; height: auto;">
  @else
  <img src="#" alt="Image Preview" class="mt-4 imagePreview" style="display: none; width: 200px; height: auto;">
  @endif

</div>


<div class="col">
  <button type="submit" class="btn btn-success w-100">{{$submitText}}</button>
</div>

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#image').change(function(e) {
          var file = e.target.files[0];
          var reader = new FileReader();

          reader.onload = function(e) {
            $('.imagePreview').show();
              $('.imagePreview').attr('src', e.target.result);
          }

          reader.readAsDataURL(file);
      });
  });
</script>

@endsection