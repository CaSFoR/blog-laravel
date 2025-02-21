<div>
    @extends('layouts.app')

    @section('title',__('Edit article'))

    @section('content')

    <div class="container d-flex justify-content-center">

        <div class="col-8">

            <h2>{{ __('Edit article') }}: {{ $article->title }}</h2>
            <form action="{{ route('articles.update',$article) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @include('articles._form',['submitText'=> __('Edit')])
            </form>
        </div>
    </div>



    @endsection
</div>