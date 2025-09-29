@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contacts2.min.css') }}" />
@endpush

<x-guest-layout>

    <x-slot name="header">
        <header class="page primary-bg">
            <div class="container">
                <div class="section_header">
                    <span class="subtitle subtitle--extended">Informations légales</span>
                    <h1 class="title">Mentions Légales</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs_item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumbs_item breadcrumbs_item--current">
                            <span>Mentions légales</span>
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


    <section class="legal section">
        <div class="container">
            <div class="main">
                <div class="legal_header section_header">
                    <h2 class="title">Mentions <span class="highlight">Légales</span></h2>
                </div>

                <div class="legal_content" style="line-height: 1.8; color: #333;">
                    
                    <div class="legal_section" style="margin-bottom: 3rem;">
                        <h3 style="color: #d4af37; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">Éditeur du site</h3>
                        <p style="margin-bottom: 1rem;">Le site dauberandpartnersconstruction.com est édité par :</p>
                        <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem;">
                            <li style="margin-bottom: 0.5rem;"><strong>Dauber And Partners Construction</strong></li>
                            <li style="margin-bottom: 0.5rem;"><strong>Forme juridique :</strong> Micro-entreprise</li>
                            <li style="margin-bottom: 0.5rem;"><strong>Siège social :</strong> 18 boulevard Lucie et Raymond Aubrac, 49100 Angers, France</li>
                            <li style="margin-bottom: 0.5rem;"><strong>SIRET :</strong> 950 925 875 00011</li>
                            <li style="margin-bottom: 0.5rem;"><strong>Directeur de la publication :</strong> Taylor Dauber</li>
                            <li style="margin-bottom: 0.5rem;"><strong>Contact :</strong> 
                                <a href="mailto:contact@dauberandpartnersconstruction.com" style="color: #d4af37; text-decoration: none;">contact@dauberandpartnersconstruction.com</a> 
                                – <a href="tel:0784045770" style="color: #d4af37; text-decoration: none;">07 84 04 57 70</a>
                            </li>
                        </ul>
                    </div>

                    <div class="legal_section" style="margin-bottom: 3rem;">
                        <h3 style="color: #d4af37; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">Hébergement</h3>
                        <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem;">
                            <li style="margin-bottom: 0.5rem;"><strong>Nom de l'hébergeur :</strong> <em>Hostinger</em></li>
                            <li style="margin-bottom: 0.5rem;"><strong>Adresse de l'hébergeur :</strong> <em>Hostinger International Ltd, 61 Lordou Vironos Street, 6023 Larnaca, Chypre</em></li>
                            <li style="margin-bottom: 0.5rem;"><strong>Téléphone de l'hébergeur :</strong> <em>+357 24 000 000</em></li>
                            <li style="margin-bottom: 0.5rem;"><strong>Site web de l'hébergeur :</strong> <em><a href="https://www.hostinger.com" style="color: #d4af37; text-decoration: none;">www.hostinger.com</a></em></li>
                            
                        </ul>
                    </div>

                    <div class="legal_section" style="margin-bottom: 3rem;">
                        <h3 style="color: #d4af37; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">Propriété intellectuelle</h3>
                        <p style="margin-bottom: 1rem;">L'ensemble du contenu (textes, images, graphismes, logo) est la propriété exclusive de Dauber And Partners Construction. Toute reproduction, même partielle, est interdite sans autorisation préalable.</p>
                    </div>

                    <div class="legal_section" style="margin-bottom: 3rem;">
                        <h3 style="color: #d4af37; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">Protection des données personnelles (RGPD)</h3>
                        <p style="margin-bottom: 1rem;">Les informations recueillies via ce formulaire sont enregistrées par Dauber And Partners Construction afin de répondre à votre demande. Elles ne sont pas transmises à des tiers. Conformément à la loi Informatique et Libertés et au RGPD, vous pouvez exercer vos droits d'accès, de rectification et de suppression en nous contactant à l'adresse suivante : 
                            <a href="mailto:contact@dauberandpartnersconstruction.com" style="color: #d4af37; text-decoration: none;">contact@dauberandpartnersconstruction.com</a>.
                        </p>
                    </div>

                    <div class="legal_section" style="margin-bottom: 3rem;">
                        <h3 style="color: #d4af37; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">Cookies</h3>
                        <p style="margin-bottom: 1rem;">Ce site utilise des cookies pour assurer son bon fonctionnement, améliorer votre expérience et réaliser des statistiques de visite. En poursuivant votre navigation, vous acceptez l'utilisation de ces cookies. Vous pouvez configurer ou désactiver les cookies directement dans votre navigateur.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
