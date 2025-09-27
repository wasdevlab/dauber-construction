@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contacts2.min.css') }}" />
@endpush

<x-guest-layout>

    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">Construisons ensemble</span>
                    <h1 class="title">Contactez-nous</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>Contact</span>
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


    <section class="contact section">
        <div class="container">
            <div class="main">
                <div class="contact_header section_header"><span class="subtitle">Contactez-nous</span>
                    <h2 class="title">Entrez en <span class="highlight">Contact</span></h2>
                    <p class="text">Nous sommes impatients de discuter de vos projets de construction et de vous proposer des solutions adaptées à tous vos besoins en bâtiment.</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success mb-4" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mb-4" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mb-4" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" class=" d-flex flex-wrap justify-content-between"
                    method="POST">
                    @csrf
                    <input
                        class="contact-form_field contact-form_field--half field required" 
                        name="feedbackName"
                        id="feedbackName" 
                        type="text" 
                        placeholder="Nom complet"
                        value="{{ old('feedbackName') }}"
                        required> 
                    <input
                        class="contact-form_field contact-form_field--half field required" 
                        data-type="tel"
                        type="text" 
                        name="feedbackTel" 
                        id="feedbackTel" 
                        placeholder="Téléphone"
                        value="{{ old('feedbackTel') }}"
                        required> 
                    <input
                        class="contact-form_field field required" 
                        data-type="email" 
                        type="email" 
                        name="feedbackEmail"
                        id="feedbackEmail" 
                        placeholder="Adresse e-mail"
                        value="{{ old('feedbackEmail') }}"
                        required>
                    <textarea 
                        class="contact-form_field field required" 
                        data-type="message" 
                        name="feedbackMessage" 
                        id="feedbackMessage"
                        placeholder="Décrivez votre projet de construction (toiture, façade, rénovation, etc.)"
                        required>{{ old('feedbackMessage') }}</textarea> 
                    <button type="submit" class="contact-form_btn btn">Envoyer le message</button>
                </form>
            </div>
            <div class="secondary">
                <ul class="contact_info contact-info">
                    <li class="contact-info_group"><span class="name">Adresse</span> <span class="content">{{ config('site.contact.full_address') }}</span></li>
                    <li class="contact-info_group"><span class="name">E-mail</span> <span
                            class="content d-inline-flex flex-column"><a style="word-break: break-all;" class="link"
                                href="mailto:{{ config('site.contact.email') }}">{{ config('site.contact.email') }}</a> </span></li>
                    <li class="contact-info_group"><span class="name">Téléphone</span> <span
                            class="content d-inline-flex flex-column"><a class="link" href="tel:{{ str_replace(['(', ')', ' ', '-'], '', config('site.contact.phone')) }}">{{ config('site.contact.phone') }}</a> </span></li>
                </ul>
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
    </section>

</x-guest-layout>
