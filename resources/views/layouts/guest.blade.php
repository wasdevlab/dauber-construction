<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    <link rel="stylesheet preload" as="style" href="{{ asset('css/preload.min.css') }}" />
    <link rel="stylesheet preload" as="style" href="{{ asset('css/icomoon.css') }}" />
    <link rel="stylesheet preload" as="style" href="{{ asset('css/libs.min.css') }}" />
 
    <link rel="stylesheet" href="{{ asset('css/floatbutton.min.css') }}" />


    @vite(['resources/js/app.js'])


        @stack('styles')
    <style>
            .section-nopb {
        padding: 80px;
    }

    @media screen and (min-width: 1169.98px) {
    .header {
        padding-top: 20px;
    }
}

@media screen and (min-width: 1023.98px) {
    .header {
        padding: 20px 0;
    }
}

.brand_logo {
    width: 100%;
    height: 42px;
}
    </style>
    

</head>

<body>
    <header class="header" >
        <div class="container d-flex">
            <a class="brand" href="{{ route('home') }}"><img class="brand_logo" src="{{ asset('img/logo.png') }}"
                    alt="{{ config('app.name') }}" />
                </a>
            <nav class="header_nav collapse" id="headerMenu">
                <ul class="header_nav-list">
                    <li class="header_nav-list_item">
                        <a class="nav-item nav-link" href="{{ route('home') }}" data-single="true"><span
                                class="nav-item_text">Accueil</span></a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-item nav-link" href="{{ route('about-us') }}" data-single="true"><span
                                class="nav-item_text">À Propos</span></a>
                    </li>
                    <li class="header_nav-list_item dropdown">
                        <a class="nav-link nav-item dropdown-toggle" href="{{ route('projects.index') }}"
                            data-bs-toggle="collapse" data-bs-target="#projectsMenu" data-trigger="dropdown"
                            data-main-link="true" aria-expanded="false" aria-controls="projectsMenu"><span
                                class="nav-item_text">Projets </span><span class="icon icon-chevron_right"></span></a>
                        <div class="dropdown-menu collapse" id="projectsMenu">
                            <ul class="dropdown-list">
                                @php
                                    $projects = \App\Models\Project::where('is_active', true)->orderBy('order')->get();
                                @endphp
                                @foreach($projects as $project)
                                    <li class="list-item">
                                        <a class="dropdown-item nav-item"
                                            href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-item nav-link" href="{{ route('gallery') }}" data-single="true"><span
                                class="nav-item_text">Galerie</span></a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-item nav-link" href="{{ route('news-and-blogs') }}" data-single="true"><span
                                class="nav-item_text">Actualités</span></a>
                    </li>
                    <li class="header_nav-list_item">
                        <a class="nav-item nav-link" href="{{ route('contact-us') }}" data-single="true"><span
                                class="nav-item_text">Contact</span></a>
                    </li>
                </ul>
            </nav>
            <button class="header_trigger" data-bs-toggle="collapse" data-bs-target="#headerMenu"
                aria-controls="headerMenu" aria-expanded="false">
                <span class="line line--short"></span> <span class="line"></span>
                <span class="line line--short"></span> <span class="line"></span>
            </button>
        </div>
    </header>

        {{ $header ?? '' }}


    <main>

        {{ $slot }}

    </main>

    <footer class="footer primary-bg">
        <div class="container">
            <div class="footer_main">
                <div class="footer_main-block">
                    <a class="brand" href="{{ route('home') }}"><img class="brand_logo"
                            src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" /></a>
                    <p class="footer_main-block_subtitle footer_main-block_subtitle--brand">
                        Nous avons hâte de discuter de la façon dont nous pourrions collaborer et apporter des solutions à vos projets.
                    </p>
                </div>
                <div class="footer_main-block">
                    <h4 class="footer_main-block_title">Contacts</h4>
                    <div class="group-wrapper">
                        <i class="icon-call icon"></i>
                        <div class="group">
                            <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', config('site.contact.phone')) }}">{{ config('site.contact.phone') }}</a>
                        </div>
                    </div>
                    <div class="group-wrapper">
                        <i class="icon-inbox icon"></i>
                        <div class="group">
                            <a href="mailto:{{ config('site.contact.email') }}">{{ config('site.contact.email') }}</a>
                        </div>
                    </div>
                    <div class="group-wrapper mt-3">
                        <i class="icon-location icon"></i>
                        <div class="group">
                            <span>{{ config('app.name') }}</span>
                            <span>{{ config('site.contact.full_address') }}</span>
                        </div>
                    </div>

                </div>
                <div class="footer_main-block">
                    <h4 class="footer_main-block_title">Entreprise</h4>
                    <ul class="footer_main-block_nav">
                        <li class="list-item">
                            <a class="nav-link link" href="{{ route('about-us') }}"><i
                                    class="icon-chevron_right icon"></i> À Propos</a>
                        </li>
                        <li class="list-item">
                            <a class="nav-link link" href="{{ route('projects.index') }}"><i
                                    class="icon-chevron_right icon"></i> Projets</a>
                        </li>
                        <li class="list-item">
                            <a class="nav-link link" href="{{ route('gallery') }}"><i
                                    class="icon-chevron_right icon"></i> Galerie</a>
                        </li>
                        <li class="list-item">
                            <a class="nav-link link" href="{{ route('news-and-blogs') }}"><i
                                    class="icon-chevron_right icon"></i> Actualités</a>
                        </li>
                        <li class="list-item">
                            <a class="nav-link link" href="{{ route('contact-us') }}"><i
                                    class="icon-chevron_right icon"></i> Contact</a>
                        </li>
                    </ul>
                </div>
             
            </div>
            <div class="footer_secondary">
                <p class="footer_secondary-copyright">
                    <span>&copy; {{ config('app.name') }}</span>
                    <span>Tous droits réservés <span id="currentYear"></span></span>
                </p>
                <ul class="socials">
                    <li class="socials_item"><a class="socials_item-link" href="{{ config('site.social.facebook') }}" target="_blank"
                            rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li class="socials_item"><a class="socials_item-link" href="{{ config('site.social.instagram') }}" target="_blank"
                            rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li class="socials_item"><a class="socials_item-link" href="{{ config('site.social.linkedin') }}" target="_blank"
                            rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <button id="scrollTrigger" type="button">
        <i class="icon icon-arrow_right"></i>
    </button>

    <script src="../player_api-1"></script>
    <script src="{{ asset('js/common.min.js') }}"></script>
    <script src="{{ asset('js/index2.min.js') }}"></script>
    {{-- <script src="{{ asset('js/demo.min.js') }}"></script> --}}

</body>

</html>
