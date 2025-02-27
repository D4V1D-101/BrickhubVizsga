<main class="d-flex justify-content-center text-center">
    <div class="section w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="mb-5">
                        <h2 class="mb-4" style="line-height:1.5">{{ $article->title }}</h2>
                        <span>{{ Carbon\Carbon::parse($article->created_at)->format('d, M Y') }} <span class="mx-2">/</span> </span>
                        <br>
                        <p class="list-inline-item ml-1">Author : {{ $article->author }}</p>
                    </div>
                    <div class="content text-center">
                        {!! $article->content !!}
                    </div>
                    @if ($article->image != "")
                    <div class="mb-5 text-center">
                        <div class="post-slider rounded overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{$article->image}}" alt="{{ $article->name }}" class="img-fluid">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
