<main>
    <div class="section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="mb-5">
                <h2 class="mb-4" style="line-height:1.5">{{ $article->title }}</h2>
                <span>{{ Carbon\Carbon::parse($article->created_at)->format('d, M Y') }} <span class="mx-2">/</span> </span>
                <p class="list-inline-item" class="ml-1">Category :  {{ $article->category_name }}
                </p>

                <p class="list-inline-item" class="ml-1">Author : {{ $article->author }}
                </p>



              </div>
              @if ($article->image !="")
              <div class="mb-5 text-center">
                <div class="post-slider rounded overflow-hidden">
                  <img loading="lazy" decoding="async" src="{{$article->image}}" alt="{{ $article->name }}">

                </div>
              </div>
              @endif
              <div class="content">
                {!! $article->content !!}
              </div>
            </div>
          </div>
        </div>
      </div>
</main>
