@push('styles')
    <link rel="stylesheet" href="{{ asset('css/single-project.min.css') }}" />
    <style>
        .project-info-list {
            margin-top: 1rem;
        }
        
        .project-info-item {
            margin-bottom: 1.5rem;
        }
        
        .project-info-item:last-child {
            margin-bottom: 0;
        }
        
        .project-info-item .property {
            font-weight: 500;
            color: #2d3748;
            margin-bottom: 0.25rem;
            font-size: 0.85rem;
        }
        
        .project-info-item .value {
            font-weight: 700;
            color: #1a202c;
            line-height: 1.4;
            font-size: 1.05rem;
        }
    </style>
@endpush

<x-guest-layout>
    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">{{ $project->subtitle ?? 'Projets' }}</span>
                    <h1 class="title">{{ $project->title }}</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item"><a href="{{ route('projects.index') }}">Projets</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>{{ $project->title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="media">
                <picture>
                    <source data-srcset="{{ asset('img/plan.webp') }}" srcset="{{ asset('img/plan.webp') }}" type="image/webp" />
                    <img class="lazy" data-src="{{ asset('img/plan.png') }}" src="{{ asset('img/plan.png') }}" alt="media" />
                </picture>
            </div>
        </header>
    </x-slot>

    <div class="about section-nopb">
        <div class="container">
            <div class="about_content">
                <article class="about_article">
                    @if($project->image)
                        <div class="media">
                            <picture>
                                <source data-srcset="{{ asset('storage/' . $project->image) }}" 
                                        srcset="{{ asset('storage/' . $project->image) }}" type="image/webp" />
                                <img class="lazy" 
                                     data-src="{{ asset('storage/' . $project->image) }}" 
                                     src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->title }}" />
                            </picture>
                        </div>
                    @endif
                    
                    <h3 class="about_article-header">{{ $project->title }}</h3>
                    
                    @if($project->description)
                        <p class="about_article-text mb-2">{{ $project->description }}</p>
                    @endif

                    @if($project->content)
                        <div class="project-content">
                            {!! nl2br(e($project->content)) !!}
                        </div>
                    @endif

                    <div class="wrapper mt-4" data-aos="fade-up">
                        <a class="btn" href="{{ route('contact-us') }}">Consulter maintenant</a>
                    </div>
                </article>
                
                <div class="about_aside">
                    <div class="about_info about_aside-item">
                        <div class="wrapper">
                            <div class="wrapper--helper">
                                <h3 class="about_info-title title">Information About the Project</h3>
                                <div class="project-info-list">
                                    @if($project->location)
                                        <div class="project-info-item">
                                            <div class="property">Location:</div>
                                            <div class="value">{{ $project->location }}</div>
                                        </div>
                                    @endif
                                    @if($project->sector)
                                        <div class="project-info-item">
                                            <div class="property">Sector:</div>
                                            <div class="value">{{ $project->sector }}</div>
                                        </div>
                                    @endif
                                    @if($project->technology)
                                        <div class="project-info-item">
                                            <div class="property">Technology:</div>
                                            <div class="value">{{ $project->technology }}</div>
                                        </div>
                                    @endif
                                    @if($project->scope_of_work)
                                        <div class="project-info-item">
                                            <div class="property">Scope of Work:</div>
                                            <div class="value">{{ $project->scope_of_work }}</div>
                                        </div>
                                    @endif
                                    @if($project->completion_date)
                                        <div class="project-info-item">
                                            <div class="property">Completion Date:</div>
                                            <div class="value">{{ $project->completion_date->format('M j, Y') }}</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <a class="link link-arrow mt-4" href="{{ route('contact-us') }}">Order service <i class="icon-arrow_right icon"></i></a>
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>