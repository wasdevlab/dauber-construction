@push('styles')
    <link rel="stylesheet" href="css/index2.min.css" />
@endpush
<x-guest-layout>
    <section class="hero primary-bg">
        <span class="hero_overlay"></span>
        <div class="container container_regular">
            <div class="section_header">
                <span class="subtitle subtitle--extended">Entreprise Générale de Construction & Rénovation</span>
            </div>
            <div class="hero_main">
                <div class="hero_slider--main swiper">
                    <div class="swiper-wrapper">
                        <div class="service swiper-slide" data-bg="img/hero/01.jpg">
                            <h2 class="title h1">Toitures, Tuiles et Charpentes</h2>
                            <p class="text">
                                Nous réalisons tous vos travaux de toiture : pose de tuiles, réparation de charpentes, 
                                installation de gouttières et étanchéité. Notre expertise couvre tous types de bâtiments, 
                                des maisons individuelles aux immeubles professionnels, avec un savoir-faire reconnu et 
                                des matériaux de qualité.
                            </p>
                        </div>
                        <div class="service swiper-slide" data-bg="img/hero/02.jpg">
                            <h2 class="title h1">Façades, Pignons et Murs</h2>
                            <p class="text">
                                Spécialisés dans la construction et rénovation de façades, nous prenons en charge tous 
                                vos projets de maçonnerie : murs porteurs, pignons, bardage, isolation thermique et 
                                ravalement. Nous intervenons sur tous types de construction pour garantir durabilité 
                                et esthétique.
                            </p>
                        </div>
                        <div class="service swiper-slide" data-bg="img/hero/03.jpg">
                            <h2 class="title h1">Pavage et Aménagements Extérieurs</h2>
                            <p class="text">
                                Nous réalisons vos aménagements extérieurs : pavage de cours et allées, création de 
                                terrasses, pose de dallages et revêtements. Nos équipes maîtrisent tous les matériaux 
                                et techniques pour sublimer vos espaces extérieurs résidentiels et professionnels.
                            </p>
                        </div>
                        <div class="service swiper-slide" data-bg="img/hero/04.jpg">
                            <h2 class="title h1">Réparations et Peinture</h2>
                            <p class="text">
                                Nos artisans interviennent pour tous vos travaux de réparation : fissures, reprises 
                                d'enduits, peinture intérieure et extérieure. Nous apportons des solutions durables 
                                pour l'entretien et la remise en état de vos bâtiments avec un service de qualité 
                                professionnelle.
                            </p>
                        </div>
                        <div class="service swiper-slide" data-bg="img/hero/05.jpg">
                            <h2 class="title h1">Maintenance et Entretien Général</h2>
                            <p class="text">
                                Nous assurons la maintenance complète de vos bâtiments : entretien préventif, 
                                nettoyage de façades, vérification des toitures, maintenance des gouttières. 
                                Un suivi régulier pour préserver la valeur et la sécurité de vos constructions 
                                sur le long terme.
                            </p>
                        </div>
                        <div class="service swiper-slide" data-bg="img/hero/06.jpg">
                            <h2 class="title h1">Rénovation Complète</h2>
                            <p class="text">
                                De la réhabilitation partielle à la rénovation complète, nous gérons l'intégralité 
                                de vos projets. Appartements, maisons, bâtiments professionnels : nous coordonnons 
                                tous les corps de métiers pour une transformation réussie, dans le respect des 
                                délais et du budget.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="hero_slider-nav swiper-pagination"></div>
            </div>
        </div>
        <div class="container container_thumbs">
            <div class="hero_slider--thumbs swiper">
                <h2 class="title h2 mb-4">Nos Domaines d'Expertise :</h2>
                <div class="swiper-wrapper">
                    <div class="thumb swiper-slide">
                        <div class="media">
                            <picture>
                                <source data-srcset="img/hero/rs=w_388,h_194,cg_true.webp"
                                    srcset="img/hero/rs=w_388,h_194,cg_true.webp" type="image/webp" />
                                <img class="lazy" data-src="img/hero/rs=w_388,h_194,cg_true.webp"
                                    src="img/hero/rs=w_388,h_194,cg_true.webp" alt="thumb" />
                            </picture>
                        </div>
                        <h4 class="title">Toitures & Charpentes</h4>
                    </div>
                    <div class="thumb swiper-slide">
                        <div class="media">
                            <picture>
                                <source data-srcset="img/hero/rs=w_730,h_730,cg_true.webp"
                                    srcset="img/hero/rs=w_730,h_730,cg_true.webp" type="image/webp" />
                                <img class="lazy" data-src="img/hero/rs=w_730,h_730,cg_true.webp"
                                    src="img/hero/rs=w_730,h_730,cg_true.webp" alt="thumb" />
                            </picture>
                        </div>
                        <h4 class="title">Façades & Maçonnerie</h4>
                    </div>
                    <div class="thumb swiper-slide">
                        <div class="media">
                            <picture>
                                <source data-srcset="img/hero/rs=w_730,h_730,cg_true (1).webp"
                                    srcset="img/hero/rs=w_730,h_730,cg_true (1).webp" type="image/webp" />
                                <img class="lazy" data-src="img/hero/rs=w_730,h_730,cg_true (1).webp"
                                    src="img/hero/rs=w_730,h_730,cg_true (1).webp" alt="thumb" />
                            </picture>
                        </div>
                        <h4 class="title">Pavage & Aménagements</h4>
                    </div>
                    <div class="thumb swiper-slide">
                        <div class="media">
                            <picture>
                                <source data-srcset="img/hero/rs=w_730,h_730,cg_true (2).webp"
                                    srcset="img/hero/rs=w_730,h_730,cg_true (2).webp" type="image/webp" />
                                <img class="lazy" data-src="img/hero/rs=w_730,h_730,cg_true (2).webp"
                                    src="img/hero/rs=w_730,h_730,cg_true (2).webp" alt="thumb" />
                            </picture>
                        </div>
                        <h4 class="title">Rénovation Complète</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="process section ">
        <div class="process_container container">
            <div class="process_header section_header">
                <span class="subtitle">Construction Durable</span>
                <h2 class="title">
                    Pourquoi Nous <span class="highlight">Choisir</span>
                </h2>
                <h3>
                    Entreprise Complète de Construction - Tous Travaux Bâtiment

                </h3>
            </div>

        </div>
        <div class="container-fluid process_fluid p-0">
            <div class="container">
                <ul class="process_steps progress-tracker progress-tracker--vertical">
                    <li class="process_steps-step progress-step">
                        <div class="progress-marker">
                            <span class="progress-marker_spot"></span>
                            <span class="progress-marker_spot--underlay"></span>
                        </div>
                        <div class="process_steps-step_wrapper">
                            <h4 class="title">Expertise Complète du Bâtiment</h4>
                            <p class="description">
                                De la toiture à la façade, du pavage aux rénovations complètes, nous maîtrisons 
                                tous les corps de métiers. Une seule équipe pour tous vos travaux de construction, 
                                réparation et entretien de bâtiments.

                            </p>
                        </div>
                    </li>
                    <li class="process_steps-step progress-step">
                        <div class="progress-marker">
                            <span class="progress-marker_spot"></span>
                            <span class="progress-marker_spot--underlay"></span>
                        </div>
                        <div class="process_steps-step_wrapper">
                            <h4 class="title">Qualité et Savoir-Faire</h4>
                            <p class="description">
                                Nos artisans qualifiés utilisent des matériaux de première qualité et des techniques 
                                éprouvées. Chaque chantier est supervisé avec rigueur pour garantir une finition 
                                impeccable et durable.

                            </p>
                        </div>
                    </li>
                    <li class="process_steps-step progress-step">
                        <div class="progress-marker">
                            <span class="progress-marker_spot"></span>
                            <span class="progress-marker_spot--underlay"></span>
                        </div>
                        <div class="process_steps-step_wrapper">
                            <h4 class="title">Service Complet et Réactif</h4>
                            <p class="description">
                                De l'évaluation gratuite à la livraison finale, nous accompagnons chaque projet avec 
                                un respect strict du budget, des délais et des standards de qualité. Notre engagement 
                                client garantit votre satisfaction sur tous vos travaux de construction et rénovation.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>

    <section class="services section">
        <div class="container">
            <div class="services_header section_header">
                <span class="subtitle">Nos Services</span>
                <h2 class="title" data-aos="fade-right" data-aos-duration="500">
                    Nous offrons des <span class="highlight">Solutions</span> complètes

                </h2>
            </div>
            <ul class="services_list">
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">01</span>
                    <h4 class="title">Toiture et Charpente</h4>
                    <p class="description">
                        Rénovation complète de toitures, remplacement de tuiles, réparation de charpentes et installation de gouttières pour tous types de bâtiments.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">02</span>
                    <h4 class="title">Façades et Murs</h4>
                    <p class="description">
                        Ravalement de façades, rénovation de pignons, construction de murs, pavage et tous travaux d'aménagement extérieur.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">03</span>
                    <h4 class="title">Réparations et Peinture</h4>
                    <p class="description">
                        Réparation de fissures, traitement de l'humidité, travaux de peinture intérieure et extérieure pour une finition parfaite.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">04</span>
                    <h4 class="title">Entretien Général</h4>
                    <p class="description">
                        Maintenance complète de bâtiments, entretien préventif et tous travaux d'amélioration pour préserver votre patrimoine immobilier.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">05</span>
                    <h4 class="title">Rénovation Complète</h4>
                    <p class="description">
                        Rénovation totale de maisons, appartements et bâtiments professionnels avec une approche globale et personnalisée.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">06</span>
                    <h4 class="title">Expertise et Conseil</h4>
                    <p class="description">
                        Évaluation technique, conseils personnalisés et accompagnement dans tous vos projets de construction et rénovation.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">07</span>
                    <h4 class="title">Maçonnerie Générale</h4>
                    <p class="description">
                        Travaux de maçonnerie, construction de murs porteurs, cloisons, et tous ouvrages en béton ou pierre.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">08</span>
                    <h4 class="title">Isolation et Étanchéité</h4>
                    <p class="description">
                        Amélioration de l'isolation thermique et phonique, traitement de l'étanchéité pour un confort optimal et des économies d'énergie.
                    </p>
                </div>
            </li>
            <li class="services_list-item" data-aos="fade-up">
                <div class="wrapper">
                    <span class="number">09</span>
                    <h4 class="title">Urgences et Dépannage</h4>
                    <p class="description">
                        Service d'urgence 24h/7j pour tous vos problèmes de toiture, fuites, infiltrations et situations nécessitant une intervention rapide.
                    </p>
                </div>
            </li>
               
            </ul>
        </div>
    </section>


   
</x-guest-layout>
