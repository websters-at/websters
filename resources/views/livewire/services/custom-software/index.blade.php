<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public ?array $pageSchema = null;
    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = route('software');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Custom Software Oberösterreich – Web-Apps ab 3.490€');
        SEOMeta::setDescription(
            'Custom Software ab 3.490€: Web-Apps, Prozess-Tools & Business-Software aus Oberösterreich für Österreich & Deutschland.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'Individualsoftware Entwicklung',
            'Custom Software Linz',
            'Softwareentwicklung Österreich',
            'Web-App Entwicklung Linz',
            'Business Software',
            'Prozess Software',
            'Laravel Software',
            'Software Agentur Linz',
            'Startup MVP Entwicklung',
            'Software ab 3490€',
            'Digitale Transformation Software'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Individualsoftware Entwicklung ab 3.490€ | Websters');
        OpenGraph::setDescription('Custom Software, Web-Apps & Prozesslösungen aus Oberösterreich. Maßgeschneidert für Unternehmen und Startups in Österreich & Deutschland.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Individualsoftware Entwicklung von Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Custom Software Entwicklung ab 3.490€ | Websters');
        TwitterCard::setDescription('Individuelle Softwarelösungen für Unternehmen & Startups in Österreich & Deutschland.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (GOOGLE-VALIDES SOFTWARE DEVELOPMENT SCHEMA)
        |--------------------------------------------------------------------------
        */

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'Service';
$schema['name'] = 'Individualsoftware Entwicklung';
$schema['description'] = 'Custom Software, Web-Apps & Business-Lösungen für Unternehmen.';
$schema['url'] = $pageUrl;

        /*
        |--------------------------------------------------------------------------
        | PROVIDER (DEIN UNTERNEHMEN)
        |--------------------------------------------------------------------------
        */

$schema['provider'] = [
            '@type' => 'Organization',
            'name' => 'Websters',
            'description' => 'Spezialisiert auf individuelle Softwareentwicklung in Österreich',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Engerwitzdorf',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'technical support',
                'availableLanguage' => ['German', 'English'],
                'telephone' => '+43 677 63177763',
                'email' => 'office@websters.at'
            ],
            'employee' => [
                [
                    '@type' => 'Person',
                    'name' => 'Michael Ruep',
                    'jobTitle' => 'DevOps Engineer & Cloud Architect',
                    'knowsAbout' => ['Architecture', 'Cloud', 'System Design']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Stevan Vlajic',
                    'jobTitle' => 'Software Engineer & UI/UX Designer',
                    'knowsAbout' => ['Full Stack Development', 'UX', 'Frontend']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Manuel Puchner',
                    'jobTitle' => 'Webentwickler & DevOps Engineer',
                    'knowsAbout' => ['Backend', 'DevOps', 'Deployment']
                ]
            ]
        ];

        /*
        |--------------------------------------------------------------------------
        | OFFERS – PREISMODELLE (Richtig strukturiert)
        |--------------------------------------------------------------------------
        */

$schema['offers'] = [
            [
                '@type' => 'Offer',
                'name' => 'Custom Software Basis',
                'description' => 'Individuelle Softwarelösung mit definiertem Funktionsumfang.',
                'priceCurrency' => 'EUR',
                'price' => 3490,
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'price' => 3490,
                    'priceCurrency' => 'EUR'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Basis Software Entwicklung'
                ]
            ],
            [
                '@type' => 'Offer',
                'name' => 'Web-App Entwicklung',
                'description' => 'Moderne Web-Applikationen & Prozesslösungen.',
                'priceCurrency' => 'EUR',
                'minPrice' => 5990,
                'maxPrice' => 25000,
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'minPrice' => 5990,
                    'maxPrice' => 25000,
                    'priceCurrency' => 'EUR'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Web Application Development'
                ]
            ],
            [
                '@type' => 'Offer',
                'name' => 'MVP Entwicklung für Startups',
                'description' => 'Minimal Viable Products für neue Geschäftsmodelle.',
                'priceCurrency' => 'EUR',
                'minPrice' => 7990,
                'maxPrice' => 15000,
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'minPrice' => 7990,
                    'maxPrice' => 15000,
                    'priceCurrency' => 'EUR'
                ]
            ]
        ];

        /*
        |--------------------------------------------------------------------------
        | TECH STACK
        |--------------------------------------------------------------------------
        */

$schema['knowsAbout'] = [
            'Languages'    => ['PHP', 'Typescript', 'JavaScript', 'Python'],
            'Frameworks'   => ['Laravel', 'Livewire', 'Vue.js', 'React', 'Next.js'],
            'Databases'    => ['MySQL', 'PostgreSQL', 'SQLite'],
            'Tools'        => ['Git', 'Docker', 'AWS', 'DigitalOcean'],
            'Methods'      => ['Agile', 'Scrum', 'TDD']
        ];

        /*
        |--------------------------------------------------------------------------
        | AUDIENCE
        |--------------------------------------------------------------------------
        */

$schema['audience'] = [
            [
                '@type' => 'Audience',
                'audienceType' => 'Businesses',
                'name' => 'KMU & Unternehmen'
            ],
            [
                '@type' => 'Audience',
                'audienceType' => 'Startups',
                'name' => 'Startups & Gründer'
            ],
            [
                '@type' => 'Audience',
                'audienceType' => 'Enterprise',
                'name' => 'Großunternehmen'
            ]
        ];
$this->pageSchema = $schema;
    }
};
?>


<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <!-- HERO -->
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Individualsoftware</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Individualsoftware-Entwicklung aus Engerwitzdorf
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Custom Software ab 3.490€: Web-Apps, Prozess-Tools und Business-Software – maßgeschneidert für Unternehmen und Startups in Österreich und Deutschland. Keine Baukästen, sondern Code, der zu deinen Abläufen passt.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Projekt anfragen</a>
                <a href="#software-pakete" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Pakete & Preise</a>
            </div>
        </div>
    </section>

    <!-- LEISTUNGEN -->
    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Was wir als Software-Agentur entwickeln</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Von der ersten Idee bis zum laufenden System: Wir entwickeln Individualsoftware mit Laravel, Python und modernen Web-Technologien – wartbar, dokumentiert und erweiterbar.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Web-Apps & Dashboards', 'Interaktive Web-Anwendungen, Kundenportale und interne Dashboards – performant umgesetzt mit Laravel und Livewire.'],
                    ['Prozess-Tools & Automatisierung', 'Python-Skripte, Scraper und Workflow-Automatisierung, die manuelle Arbeit und Fehlerquoten drastisch reduzieren.'],
                    ['APIs & Systemintegration', 'Schnittstellen zwischen deinen Systemen: ERP, CRM, Shops und Drittanbieter sauber miteinander verbunden.'],
                    ['MVPs für Startups', 'Schlanke Minimum Viable Products in Wochen statt Monaten – validiere deine Idee, bevor du groß investierst.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark md:text-lg">{{ $t }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PAKETE -->
    <section class="py-12 lg:py-16 bg-slate-50" id="software-pakete">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Pakete & Preise: Custom Software ab 3.490€</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Transparente Einstiegspreise, jedes Angebot maßgeschneidert. Alle Pakete inklusive Beratung, Entwicklung, Tests und Übergabe mit Dokumentation.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Basis', 'ab 3.490€', 'Individuelle Softwarelösung mit definiertem Funktionsumfang – ideal für ein klar abgegrenztes Tool oder eine erste Web-App.', ['Festpreis-Angebot', 'Web-App mit Kernfunktionen', 'Responsive Umsetzung', 'Dokumentation & Übergabe']],
                    ['Business', 'auf Anfrage', 'Umfassende Business-Software mit Anbindungen: API-Integrationen, Rollen & Rechte, Reporting und Prozess-Logik.', ['Alles aus Basis', 'API- & Systemintegration', 'Rollen, Rechte & Workflows', 'Erweiterte Tests']],
                    ['Enterprise', 'auf Anfrage', 'Komplexe Systeme für Großunternehmen: Architektur-Beratung, Cloud-Deployment, SLAs und laufende Weiterentwicklung.', ['Alles aus Business', 'Cloud-Architektur & DevOps', 'SLA & Wartungspaket', 'Schulung deines Teams']],
                ] as [$t, $p, $d, $fs])
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark text-lg">{{ $t }}</div>
                        <div class="mt-1 text-2xl font-bold text-brand-dark">{{ $p }}</div>
                        <p class="mt-2 text-sm text-slate-600">{{ $d }}</p>
                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            @foreach($fs as $f)<li>✓ {{ $f }}</li>@endforeach
                        </ul>
                        <a href="/kontakt" class="btn btn-sm btn-primary mt-6 text-white">Anfragen</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ABLAUF -->
    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">So läuft dein Software-Projekt ab</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-4">
                @foreach([
                    ['1. Analyse', 'Wir verstehen deine Prozesse, Ziele und Anforderungen – kostenloses Erstgespräch inklusive.'],
                    ['2. Konzept & Angebot', 'Du erhältst Architektur-Entwurf, Zeitplan und Festpreis. Keine Überraschungen.'],
                    ['3. Entwicklung', 'Iterative Umsetzung mit laufendem Feedback. Du siehst Fortschritt, keine Blackbox.'],
                    ['4. Launch & Betreuung', 'Deployment, Schulung, Dokumentation – plus Wartungspaket mit Updates und Support.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark">{{ $t }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="pt-12 lg:pt-16 pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Häufige Fragen zur Individualsoftware</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet Individualsoftware bei Websters?', 'a' => 'Custom Software startet bei 3.490€ für eine Lösung mit definiertem Funktionsumfang (Basis-Paket). Größere Business-Software mit Integrationen und komplexe Enterprise-Systeme kalkulieren wir individuell – du erhältst immer ein Festpreis-Angebot ohne versteckte Kosten.'],
                    ['q' => 'Wie lange dauert die Entwicklung einer Web-App?', 'a' => 'Ein MVP oder ein fokussiertes Tool ist typischerweise in 4–8 Wochen live. Größere Business-Anwendungen dauern 2–6 Monate. Durch iterative Entwicklung nutzt du erste Funktionen schon während das Projekt läuft.'],
                    ['q' => 'Mit welchen Technologien entwickelt ihr Software?', 'a' => 'Unsere Kern-Stacks sind Laravel mit Livewire für Web-Anwendungen und Python für Automatisierung, Datenverarbeitung und Backend-Systeme. Dazu kommen MySQL/PostgreSQL, Docker und moderne Frontend-Technologien. Alles wartbar und zukunftssicher.'],
                    ['q' => 'Übernehmt ihr auch bestehende Software-Projekte?', 'a' => 'Ja. Wir analysieren deine bestehende Code-Basis – egal ob von einer anderen Agentur oder intern entwickelt – und übernehmen Wartung, Erweiterung oder ein sauberes Refactoring. Auch Legacy-Systeme sind willkommen.'],
                    ['q' => 'Wem gehört der entwickelte Code?', 'a' => 'Dir. Du erhältst den vollständigen Quellcode inklusive Dokumentation. Keine Lizenzfallen, keine Abhängigkeit: Wartung durch uns ist ein Angebot, keine Pflicht.'],
                    ['q' => 'Bietet ihr Wartung und Support nach dem Launch?', 'a' => 'Ja, mit unserem Wartungspaket: Updates, Sicherheitschecks, Backups, Monitoring und Support mit definierten Reaktionszeiten. So bleibt deine Software sicher und aktuell.'],
                ];
                $faqSchema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $faqs)];
            @endphp
            <div class="mt-6 space-y-3">
                @foreach($faqs as $faq)
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-4 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark">{{ $faq['q'] }}</div>
                        <p class="mt-2 text-sm text-neutral-600 lg:text-base">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
            <script type="application/ld+json">@json($faqSchema)</script>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="/kontakt" class="btn btn-primary text-white">Jetzt Projekt besprechen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
