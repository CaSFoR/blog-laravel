<section class="bsb-blog-5 py-md-5 py-xl-8" >
  <div class="container-fluid">
    <div class="row p-4 m-auto">

      <!-- Articles Section -->
      <div class="col-lg-10 col-12 order-2 order-lg-1 ">
        <div class="row">
          @forelse ($articles as $article)
          <div class="col-12 col-lg-4 mb-4">
            <article class="card border-0 bg-transparent articles-list">
              <figure class="card-img-top mb-4 overflow-hidden bsb-overlay-hover">
                <a href="{{ route('articles.show',$article->slug) }}">
                  <img loading="lazy" src="{{ env('APP_URL').'/'.$article->image_path }}" alt="Living"
                    style="width: 100%; height: 280px;">
                </a>
                <figcaption>
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                    <path
                      d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
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
                        href="{{ route('tag.search', $category->title) }}"> {{ __($category->title) }}</a>
                      @endforeach



                    </li>
                  </ul>
                  <h2 class="card-title entry-title h4 m-0 balanced">
                    <a class="link-dark text-decoration-none" href="#!">{{ $article->title }}</a>
                  </h2>
                </div>
              </div>
              <div class="card-footer border-0 bg-transparent p-0 m-0">
                <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                  <li>
                    <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center" href="#!">
                      <i class="fa-regular fa-calendar-days"></i>
                      <span class="ms-2 fs-7">{{ date_format($article->created_at,'Y, F d')}}</span>
                    </a>
                  </li>
                  <li>
                    <span class="px-3">&bull;</span>
                  </li>
                  <li>
                    <a class="link-secondary text-decoration-none d-flex align-items-center" href="#!">
                      <i class="fa-regular fa-comment-dots"></i>
                      <span class="ms-2 fs-7">{{ $article->comments()->count() }}</span>

                    </a>

                  </li>

                </ul>
                <div class="mt-2">

                  <livewire:favorite-store :article_id="$article->id">
                </div>
              </div>
            </article>

          </div>
          @empty
          <div class="col-12 text-center">
            <h2>No Articles</h2>
          </div>
          @endforelse

        </div>
      </div>

      <!-- Sticky Search Bar -->
      <div class="col-lg-2 order-lg-2">
        <div class="position-sticky" style="top: 20px;">
          <form action="{{ route('articles.search')}}" method="get" class="d-flex align-items-start ">
            <input type="search" placeholder="Search..." name="q" class="form-control mb-4"
              style="border-radius: 5px  0px 0px 5px" required>
            <button type="submit" class="btn btn-sm btn-primary "
              style="border-radius: 0px 5px 5px 0px; padding:7px;"><i class="fa fa-search"></i></button>
          </form>
          <h4>Tags</h4>
          <ul class="entry-meta list-unstyled d-flex flex-column mb-3">
            @foreach ($categories as $category)
            <li class="mt-2">
              <a class="d-inline-flex px-2 py-1 link-primary text-primary-emphasis border border-primary-subtle rounded-2 text-decoration-none fs-7 me-2"
                href="{{ route('tag.search', $category->title) }}">
                {{ $category->title }}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>