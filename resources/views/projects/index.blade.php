@push('styles')
    <link rel="stylesheet" href="{{ asset('css/projects.min.css') }}" />
@endpush

<x-guest-layout>
    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">Notre Portfolio</span>
                    <h1 class="title">Projets</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>Projets</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="media">
                <picture>
                    <source data-srcset="{{ asset('img/plan.webp') }}" srcset="{{ asset('img/plan.webp') }}" type="image/webp" />
                    <img class="lazy" data-src="{{ asset('img/plan.png') }}" src="{{ asset('img/plan.png') }}" alt="Projects" />
                </picture>
            </div>
        </header>
    </x-slot>

    <section class="projects section">
        <div class="container">
            <div class="section_header">
                <span class="subtitle">Nos Réalisations</span>
                <h2 class="title">Projets <span class="highlight">Réalisés</span></h2>
                <p class="text">Découvrez notre portfolio diversifié de projets de construction et rénovation réussis.</p>
            </div>

            <ul class="projects_list">
                @foreach($projects as $project)
                    <li class="projects_list-item">
                        <div class="media" data-aos="zoom-in-right">
                            <picture>
                                @if($project->image)
                                    <source data-srcset="{{ asset('storage/' . $project->image) }}" 
                                            srcset="{{ asset('storage/' . $project->image) }}" type="image/webp">
                                    <img class="lazy" 
                                         data-src="{{ asset('storage/' . $project->image) }}" 
                                         src="{{ asset('storage/' . $project->image) }}" 
                                         alt="{{ $project->title }}">
                                @else
                                    <source data-srcset="{{ asset('img/plan.webp') }}" 
                                            srcset="{{ asset('img/plan.webp') }}" type="image/webp">
                                    <img class="lazy" 
                                         data-src="{{ asset('img/plan.png') }}" 
                                         src="{{ asset('img/plan.png') }}" 
                                         alt="{{ $project->title }}">
                                @endif
                            </picture>
                        </div>
                        <div class="main">
                            <h3 class="main_title" data-aos="fade-in">
                                <span class="text">{{ $project->title }}</span>
                                <span class="divider divider--line" data-aos="slide-right"></span>
                            </h3>
                            <div class="main_info">
                                @if($project->location)
                                    <span class="location" data-aos="fade-in" data-aos-delay="50">
                                        <i class="icon-location icon"></i> {{ $project->location }}
                                    </span>
                                @endif
                                <a class="link link-arrow" href="{{ route('projects.show', $project->slug) }}" 
                                   data-aos="fade-in" data-aos-delay="50">
                                    Details <i class="icon-arrow_right icon"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            @if($projects->isEmpty())
                <div class="text-center py-5">
                    <h3>No Projects Available</h3>
                    <p>We're currently updating our project portfolio. Please check back soon!</p>
                </div>
            @endif
        </div>
    </section>
</x-guest-layout>