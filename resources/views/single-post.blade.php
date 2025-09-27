@push('styles')
    <link rel="stylesheet" href="{{ asset('css/single-post.min.css') }}" />

@endpush
<x-guest-layout>

    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">Article</span>
                    <h1 class="title">{{ $blog->title }}</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item"><a href="{{ route('news-and-blogs') }}">Actualités</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>{{ $blog->title }}</span>
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

   <div class="post section-nopb">
      <div class="post_container container">
        <div class="post_content" style="width: 100%">
          <article class="post_article">
            <div class="post_article-media">
              @if($blog->featured_image)
              <picture>
                <img class="lazy" data-src="{{ asset($blog->featured_image) }}" src="{{ asset($blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?: $blog->title }}" />
              </picture>
              @endif
            </div>
            <div class="metadata">
              <span class="date">{{ $blog->created_at->format('F d, Y') }}</span>
              <i class="icon icon-dot"></i>
              <span class="author">par <a class="link" href="#">{{ $blog->author ? $blog->author->name : 'Admin' }}</a></span>
              @if($blog->tags && count($blog->tags) > 0)
              <i class="icon icon-dot"></i>
              <span class="category">{{ $blog->tags[0] }}</span>
              @endif
            </div>
            <div class="post_article-content">
              {!! nl2br(e($blog->content)) !!}
            </div>
            <div class="post_article-footer">
              @if($blog->tags && count($blog->tags) > 0)
              <div class="tags">
                @foreach($blog->tags as $tag)
                <a class="tags_item" href="{{ route('news-and-blogs', ['tag' => $tag]) }}">{{ $tag }}</a>
                @endforeach
              </div>
              @endif
              <ul class="socials">
                <li class="socials_item">
                  <a
                    class="socials_item-link"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Facebook"
                    ><i class="icon-facebook"></i
                  ></a>
                </li>
                <li class="socials_item">
                  <a
                    class="socials_item-link"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram"
                    ><i class="icon-instagram"></i
                  ></a>
                </li>
                <li class="socials_item">
                  <a
                    class="socials_item-link"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Twitter"
                    ><i class="icon-twitter"></i
                  ></a>
                </li>
                <li class="socials_item">
                  <a
                    class="socials_item-link"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="WhatsApp"
                    ><i class="icon-whatsapp"></i
                  ></a>
                </li>
              </ul>
            </div>
          </article>
          @if($previousPost || $nextPost)
          <div class="post_nav swiper-controls">
            @if($previousPost)
            <div class="post_nav-item post_nav-item--prev">
              <a
                class="post_nav-item_control swiper-button"
                href="{{ route('single-post', $previousPost->slug) }}"
                aria-label="Go to the previous post"
                ><i class="icon-arrow_left icon"></i
              ></a>
              <div class="post_nav-item_hint">
                <span class="label">Previous</span>
                <h4 class="title">{{ $previousPost->title }}</h4>
              </div>
            </div>
            @else
            <div class="post_nav-item post_nav-item--prev" style="visibility: hidden;">
              <!-- Placeholder to maintain layout -->
            </div>
            @endif
            
            @if($nextPost)
            <div class="post_nav-item post_nav-item--next">
              <div class="post_nav-item_hint">
                <span class="label">Next</span>
                <h4 class="title">{{ $nextPost->title }}</h4>
              </div>
              <a
                class="post_nav-item_control swiper-button"
                href="{{ route('single-post', $nextPost->slug) }}"
                aria-label="Go to the next post"
                ><i class="icon-arrow_right icon"></i
              ></a>
            </div>
            @else
            <div class="post_nav-item post_nav-item--next" style="visibility: hidden;">
              <!-- Placeholder to maintain layout -->
            </div>
            @endif
          </div>
          @endif
       
        
        </div>
        <aside class="widgets">
          
          
          <div class="widgets_widget widgets_widget--latest">
            <h3 class="widgets_widget-title">Featured Articles</h3>
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
         
          <div class="widgets_widget widgets_widget--tags">
            <h3 class="widgets_widget-title">Tags</h3>
            <div class="tags">
              @forelse($uniqueTags as $tag)
                <a class="tags_item" href="{{ route('news-and-blogs', ['tag' => $tag]) }}">{{ $tag }}</a>
              @empty
                <p class="text-gray-500 text-sm">No tags available</p>
              @endforelse
            </div>
          </div>
          
        </aside>
      </div>
      <aside class="latest section">
        <div class="container">
          <div class="blog_header section_header">
            <span class="subtitle">Our blog</span>
            <h2 class="title" data-aos="fade-right" data-aos-duration="500">
              Latest Posts
            </h2>
          </div>
          <ul class="blog_feed">
            @forelse($latestPosts as $latestPost)
            <li class="blog_feed-item">
              @if($latestPost->featured_image)
              <div class="media">
                <picture>
                  <img
                    class="lazy"
                    data-src="{{ asset($latestPost->featured_image) }}"
                    src="{{ asset($latestPost->featured_image) }}"
                    alt="{{ $latestPost->featured_image_alt ?: $latestPost->title }}"
                  />
                </picture>
              </div>
              @endif
              <div class="main">
                <div class="metadata">
                  @if($latestPost->tags && count($latestPost->tags) > 0)
                  <a class="category" href="{{ route('news-and-blogs', ['tag' => $latestPost->tags[0]]) }}">{{ $latestPost->tags[0] }}</a>
                  <i class="icon icon-dot"></i>
                  @endif
                  <span class="date">{{ $latestPost->created_at->format('F d, Y') }}</span>
                </div>
                <h4 class="main_title">
                  {{ $latestPost->title }}
                </h4>
                <p class="main_text">
                  {{ Str::limit($latestPost->excerpt ?: strip_tags($latestPost->content), 120) }}
                </p>
                <a class="link link-arrow" href="{{ route('single-post', $latestPost->slug) }}"
                  >Read post <i class="icon-arrow_right icon"></i
                ></a>
              </div>
            </li>
            @empty
            <li class="blog_feed-item">
              <div class="main">
                <h4 class="main_title">No recent posts available</h4>
                <p class="main_text">Check back soon for new content.</p>
                <a class="link link-arrow" href="{{ route('news-and-blogs') }}"
                  >View all posts <i class="icon-arrow_right icon"></i
                ></a>
              </div>
            </li>
            @endforelse
          </ul>
        </div>
      </aside>
    </div>
</x-guest-layout>
