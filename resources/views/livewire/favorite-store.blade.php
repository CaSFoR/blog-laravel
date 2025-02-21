<div>
    @if (session()->has('storedArticle'))
    <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
        x-init="setTimeout(() => flashMessage = false, 3000)">
        <h6>{{ session('storedArticle') }}</h6>
    </div>
    @endif


    @if (session()->has('message'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Alert! </strong> {{ session('message') }}
    </div>
    @endif

    <div class="mt-2">
        <a wire:click='store({{ $article_id }})' class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
    </div>

</div>