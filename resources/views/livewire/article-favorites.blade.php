<div>
    {{-- The Master doesn't talk, he acts. --}}
    @if (session()->has('message'))
    <div class="alert alert-success mt-2" x-data="{flashMessage: true}" x-show="flashMessage"
        x-init="setTimeout(() => flashMessage = false, 2250)">
        <h6>{{ Session('message') }}</h6>
    </div>
    @endif
    <section class="bsb-blog-5 py-3 py-md-5 py-xl-8 ">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="display-5 mb-4 mb-md-5 text-center">Favorite Articles</h2>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row gy-4 gy-md-5 gx-xl-6 gy-xl-6 gx-xxl-9 gy-xxl-9 ">


                @forelse ($articles as $article)


                <div class="col-12 col-lg-4">
                    <article>
                        <div class="card border-0 bg-transparent">
                            <figure class="card-img-top mb-4 overflow-hidden bsb-overlay-hover">
                                <a href="{{ route('articles.show',$article->slug) }}">
                                    <img style="width: 100%; height: 250px;" loading="lazy"
                                        src="{{ $article->image_path }}" alt="Living">
                                </a>
                                <figcaption>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                        class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                    <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                                </figcaption>
                            </figure>
                            <div class="card-body m-0 p-0">
                                <div class="entry-header mb-3">
                                    <ul class="entry-meta list-unstyled d-flex mb-3">
                                        <li>

                                            @foreach ($article->categories()->get() as $category)
                                            <a class="d-inline-flex px-2 py-1 link-primary text-primary-emphasis border border-primary-subtle rounded-2 text-decoration-none fs-7 me-2"
                                                href="{{ route('tag.search', $category->title) }}"> {{
                                                __($category->title) }}</a>
                                            @endforeach



                                        </li>
                                    </ul>
                                    <h2 class="card-title entry-title h4 m-0">
                                        <a class="link-dark text-decoration-none" href="#!">{{ $article->title }}</a>
                                    </h2>
                                </div>
                            </div>

                            <div class="card-footer border-0 bg-transparent p-0 m-0">
                                <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                    <li>
                                        <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                            href="#!">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            <span class="ms-2 fs-7">{{ date_format($article->created_at,'Y, F
                                                d')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <span class="px-3">&bull;</span>
                                    </li>
                                    <li>
                                        <a class="link-secondary text-decoration-none d-flex align-items-center"
                                            href="#!">
                                            <i class="fa-regular fa-comment-dots"></i>
                                            <span class="ms-2 fs-7">{{ $article->comments()->count() }}</span>

                                        </a>

                                    </li>

                                </ul>
                                <div class="mt-2">
                                    <a wire:click='destroy({{ $article->id }})' class="btn btn-outline-danger btn-sm">
                                        <i class="fa-solid fa-heart-crack"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>


                @empty
                {{ __('No Favorite Articles') }}

                @endforelse


            </div>
        </div>
    </section>

</div>