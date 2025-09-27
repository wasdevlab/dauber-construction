@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gallery-grid.min.css') }}" />
@endpush
<x-guest-layout>

    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">Nos Réalisations</span>
                    <h1 class="title">Galerie</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>Galerie</span>
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

    <div class="gallery section">
        <div class="container">
            <ul class="gallery_grid" data-role="gallery">
                @foreach($galleries as $gallery_item)
                <li class="gallery_item" data-aos="fade-up">
                    <a class="media" href="{{ asset($gallery_item->image_path) }}" data-caption="{{ $gallery_item->title }}"
                        data-role="gallery-link">
                        <picture>
                            <img class="lazy" data-src="{{ asset($gallery_item->image_path) }}" src="{{ asset($gallery_item->image_path) }}"
                                alt="{{ $gallery_item->image_alt ?: $gallery_item->title }}" />
                        </picture>
                        <div class="overlay">
                            <h4 class="overlay_caption">
                                {{ $gallery_item->title }}
                            </h4>
                            <span class="overlay_label">{{ $gallery_item->project_type }}</span>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-guest-layout>
