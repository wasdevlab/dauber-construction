@push('styles')
    <link rel="stylesheet" href="{{ asset('css/blog.min.css') }}" />
@endpush
<x-guest-layout>

    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">Actualités Construction</span>
                    <h1 class="title">Actualités et Blog</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>Actualités</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="media">
                <picture>
                    <source data-srcset="{{ asset('img/plan.webp') }}" srcset="{{ asset('img/plan.webp') }}"
                        type="image/webp" />
                    <img class="lazy" data-src="{{ asset('img/plan.png') }}" src="{{ asset('img/plan.png') }}"
                        alt="media" />
                </picture>
            </div>
        </header>
    </x-slot>

   <div class="blog section">
      <div class="container">
        <div class="blog_wrapper">
          <ul class="blog_feed">
            @foreach($blogs as $blog)
            <li class="blog_feed-item">
              <div class="media">
                @if($blog->featured_image)
                <picture>
                  <img class="lazy" data-src="{{ asset($blog->featured_image) }}" src="{{ asset($blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?: $blog->title }}" />
                </picture>
                @else
                <picture>
                  <img class="lazy" data-src="{{ asset('img/blog/default.jpg') }}" src="{{ asset('img/blog/default.jpg') }}" alt="{{ $blog->title }}" />
                </picture>
                @endif
              </div>
              <div class="main">
                <div class="metadata">
                  @if($blog->tags && count($blog->tags) > 0)
                    <a class="category" href="{{ route('news-and-blogs', ['tag' => $blog->tags[0]]) }}">{{ $blog->tags[0] }}</a>
                    <i class="icon icon-dot"></i>
                  @endif
                  <span class="date">{{ $blog->created_at->format('F d, Y') }}</span>
                </div>
                <h4 class="main_title">
                  @if($blog->featured)
                    <i class="icon-bookmark icon"></i>
                  @endif
                  {{ $blog->title }}
                </h4>
                <p class="main_text">
                  {{ $blog->excerpt }}
                </p>
                <a class="link link-arrow" href="{{ route('single-post', $blog->slug) }}"
                  >Lire l'article <i class="icon-arrow_right icon"></i
                ></a>
              </div>
            </li>
            @endforeach
          </ul>
          {{ $blogs->links() }}
        </div>
        <aside class="widgets">
          
          <div class="widgets_widget widgets_widget--latest">
            <h3 class="widgets_widget-title">Articles en Vedette</h3>
            <ul class="list">
              @foreach($featuredBlogs as $featuredBlog)
              <li class="list-item">
                @if($featuredBlog->featured_image)
                <div class="media">
                  <picture>
                    <img class="lazy" data-src="{{ asset($featuredBlog->featured_image) }}" src="{{ asset($featuredBlog->featured_image) }}" alt="{{ $featuredBlog->featured_image_alt ?: $featuredBlog->title }}" />
                  </picture>
                </div>
                @endif
                <h4 class="title">{{ $featuredBlog->title }}</h4>
                <a class="link link-arrow" href="{{ route('single-post', $featuredBlog->slug) }}"
                  >Read now <i class="icon-arrow_right icon"></i
                ></a>
              </li>
              @endforeach
            </ul>
          </div>
          
        </aside>
      </div>
    </div>

</x-guest-layout>
