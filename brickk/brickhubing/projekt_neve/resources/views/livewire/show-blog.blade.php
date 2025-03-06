<main>
    <section class="page-header bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">News</h2>
                    <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                        <li class="list-inline-item"><a href="index.html">Home</a></li>
                        <li class="list-inline-item">/ &nbsp; <a href="blog.html">News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="me-lg-4">
                        <div class="row gy-5">
                            @if ($articles->isNotEmpty())
                                @foreach ($articles as $singleArticle)
                                    <div class="col-md-6" data-aos="fade">
                                        <article class="blog-post">
                                            <div class="post-slider slider-sm rounded">
                                                @if ($singleArticle->image)
                                                    <img loading="lazy" decoding="async" src="{{ $singleArticle->image }}" alt="{{ $singleArticle->title }}">
                                                @endif
                                            </div>
                                            <div class="pt-4">
                                                <p class="mb-3">{{ \Carbon\Carbon::parse($singleArticle->created_at)->format('d M, Y') }}</p>
                                                <h2 class="h4"><a class="text-black" wire:navigate href="{{ route('blogDetail', $singleArticle->id) }}">{{ $singleArticle->title }}</a></h2>
                                                <a wire:navigate href="{{ route('blogDetail', $singleArticle->id) }}" class="text-primary fw-bold" aria-label="Read the full article by clicking here">Read More</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget widget-categories">
                        <h5 class="widget-title"><span>Category</span></h5>
                        <ul class="list-unstyled widget-list">
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                    <li><a wire:navigate href="{{ route('blog').'?categorySlug='.$category->slug }}">{{ $category->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <div class="widget">
                        <h5 class="widget-title"><span>Latest Article</span></h5>
                        @if ($latestArticles->isNotEmpty())
                            @foreach ($latestArticles as $latestArticle)
                                <ul class="list-unstyled widget-list">
                                    <li class="d-flex widget-post align-items-center">
                                        <a class="text-black" wire:navigate href="{{ route('blogDetail', $latestArticle->id) }}">
                                            <div class="widget-post-image flex-shrink-0 me-3">
                                                @if ($latestArticle->image)
                                                    <img loading="lazy" decoding="async" src="{{ $latestArticle->image }}" alt="{{ $latestArticle->title }}">
                                                @endif
                                            </div>
                                        </a>
                                        <div class="flex-grow-1">
                                            <h5 class="h6 mb-0"><a class="text-black" wire:navigate href="{{ route('blogDetail', $latestArticle->id) }}">{{ $latestArticle->title }}</a></h5>
                                            <small>{{ \Carbon\Carbon::parse($latestArticle->created_at)->format('d M, Y') }}</small>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
