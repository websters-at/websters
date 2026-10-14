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
        $pageUrl = route('consulting');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('IT-Consulting Oberösterreich – Prozesse & Digitalisierung');
        SEOMeta::setDescription(
            'IT-Consulting für KMU: Prozessoptimierung, Digitalisierung & Automatisierung aus Oberösterreich – für Unternehmen in Österreich & Deutschland.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'IT-Consulting Linz',
            'Prozessoptimierung Österreich',
            'Digitale Transformation Unternehmen',
            'Workflow Automatisierung',
            'Geschäftsprozess Optimierung',
            'IT-Beratung Linz',
            'Digitalisierung Beratung',
            'Business Process Optimization',
            'Systemintegration Beratung',
            'Change Management IT',
            'IT Strategie Entwicklung'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('IT-Consulting & Prozessoptimierung aus Engerwitzdorf | Websters');
        OpenGraph::setDescription('Strategische IT-Beratung zur digitalen Transformation & Prozessoptimierung. Für Unternehmen in Österreich & Deutschland.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'IT-Consulting und Prozessoptimierung – Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('IT-Consulting & Prozessoptimierung | Websters');
        TwitterCard::setDescription('Digitale Transformation, Prozessanalyse & Automatisierung für Unternehmen in Österreich.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (Google-valid, korrigiert & optimiert)
        |--------------------------------------------------------------------------
        */

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'Service';
$schema['name'] = 'IT-Consulting & Prozessoptimierung';
$schema['description'] = 'IT-Beratung für digitale Transformation, Effizienzsteigerung & Prozessoptimierung.';
$schema['url'] = $pageUrl;

$schema['serviceType'] = 'IT Consulting';
$schema['category'] = 'BusinessConsulting';

        /*
        |--------------------------------------------------------------------------
        | PROVIDER (DEIN UNTERNEHMEN)
        |--------------------------------------------------------------------------
        */

$schema['provider'] = [
            '@type' => 'ProfessionalService',
            'name' => 'Websters',
            'description' => 'IT-Consulting & Prozessoptimierung für Unternehmen in Österreich',
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
                'contactType' => 'consulting support',
                'availableLanguage' => ['German'],
                'telephone' => '+43 677 63177763',
                'email' => 'office@websters.at'
            ],
            'employee' => [
                [
                    '@type' => 'Person',
                    'name' => 'Michael Ruep',
                    'jobTitle' => 'DevOps Engineer & Cloud Architect',
                    'knowsAbout' => ['Cloud Architecture', 'IT Strategy', 'Infrastructure']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Stevan Vlajic',
                    'jobTitle' => 'UX Designer & Software Engineer',
                    'knowsAbout' => ['User Experience', 'Process Design', 'Digital Workflows']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Manuel Puchner',
                    'jobTitle' => 'Webentwickler & DevOps Engineer',
                    'knowsAbout' => ['Software Implementation', 'Process Automation', 'System Integration']
                ]
            ]
        ];

        /*
        |--------------------------------------------------------------------------
        | OFFERS (BERATUNG – PREIS AUF ANFRAGE)
        |--------------------------------------------------------------------------
        */

$schema['offers'] = [
            [
                '@type' => 'Offer',
                'name' => 'IT-Consulting Initialanalyse',
                'description' => 'Analyse Ihrer Geschäftsprozesse & Identifikation von Optimierungs-Potenzialen.',
                'priceCurrency' => 'EUR',
                'price' => 0, // Auf Anfrage
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Prozessanalyse'
                ]
            ],
            [
                '@type' => 'Offer',
                'name' => 'Digitale Transformations-Beratung',
                'description' => 'Strategische Beratung zur digitalen Weiterentwicklung Ihres Unternehmens.',
                'priceCurrency' => 'EUR',
                'price' => 0
            ],
            [
                '@type' => 'Offer',
                'name' => 'Workflow-Automatisierung',
                'description' => 'Planung & Implementierung automatisierter digitaler Workflows.',
                'priceCurrency' => 'EUR',
                'price' => 0
            ]
        ];

        /*
        |--------------------------------------------------------------------------
        | REGIONS / ZIELGEBIETE
        |--------------------------------------------------------------------------
        */

$schema['areaServed'] = [
            ['@type' => 'State', 'name' => 'Oberösterreich'],
            ['@type' => 'Country', 'name' => 'Österreich'],
            ['@type' => 'Country', 'name' => 'Deutschland']
        ];

        /*
        |--------------------------------------------------------------------------
        | OFFER KATALOG (THEMENBEREICHE)
        |--------------------------------------------------------------------------
        */

$schema['hasOfferCatalog'] = [
            '@type' => 'OfferCatalog',
            'name' => 'IT-Consulting Katalog',
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Prozessanalyse & Optimierung',
                        'description' => 'Analyse und Optimierung bestehender Workflows.'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Software-Auswahl & Implementierung',
                        'description' => 'Beratung & Begleitung bei Softwareintegration.'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Digitalisierungsstrategie',
                        'description' => 'Strategische digitale Roadmaps für Unternehmen.'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'IT-Infrastruktur Consulting',
                        'description' => 'Beratung zur Modernisierung Ihrer IT-Systeme.'
                    ]
                ],
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
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">IT-Consulting</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                IT-Consulting aus Engerwitzdorf: Prozesse optimieren, digitalisieren, automatisieren
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Wir analysieren deine Geschäftsprozesse und machen sie schneller, günstiger und fehlerfrei: Prozessoptimierung, digitale Transformation, Automatisierung und IT-Strategie für KMU und Startups in Österreich und Deutschland.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Beratung anfragen</a>
                <a href="#consulting-leistungen" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Leistungen</a>
            </div>
        </div>
    </section>

    <!-- LEISTUNGEN -->
    <section class="py-12 lg:py-16" id="consulting-leistungen">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Unsere Consulting-Leistungen</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Technik verstehen wir – aber wir sprechen Business. Jede Empfehlung ist umsetzbar kalkuliert, kein Berater-Blabla.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Prozessoptimierung', 'Wir finden manuelle Engpässe und Medienbrüche in deinen Abläufen und designen schlanke, digitale Prozesse – messbar schneller und günstiger.'],
                    ['Digitalisierung & Transformation', 'Strategische Roadmap statt Aktionismus: Was digitalisieren, in welcher Reihenfolge, mit welchem ROI. Inklusive Change-Begleitung fürs Team.'],
                    ['Automatisierung', 'Python-Skripte, Workflow-Automatisierung und Systemintegration, die Routinearbeit eliminieren – oft mit Amortisation in wenigen Monaten.'],
                    ['Software-Auswahl & Implementierung', 'Neutrale Beratung bei Tool- und Software-Entscheidungen plus Begleitung bei Einführung, Migration und Schulung.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark md:text-lg">{{ $t }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ABLAUF -->
    <section class="py-12 lg:py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">So läuft die Beratung ab</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-4">
                @foreach([
                    ['1. Kennenlernen', 'Kostenloses Erstgespräch: Wo drückt der Schuh, was soll besser werden, was darf es bringen?'],
                    ['2. Analyse', 'Wir schauen uns Prozesse, Systeme und Zahlen an – vor Ort oder remote – und finden die größten Hebel.'],
                    ['3. Konzept & Roadmap', 'Priorisierte Maßnahmen mit Aufwand, Nutzen und Zeitplan. Du entscheidest, was umgesetzt wird.'],
                    ['4. Umsetzung & Begleitung', 'Auf Wunsch setzen wir alles selbst um – oder begleiten dein Team. Inklusive Erfolgsmessung.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark">{{ $t }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Häufige Fragen zum IT-Consulting</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet IT-Consulting bei Websters?', 'a' => 'Das Erstgespräch ist kostenlos. Analysen und Konzepte kalkulieren wir als Festpreis nach einem kurzen Scoping – typische Einstiegsprojekte für KMU liegen im niedrigen vierstelligen Bereich. Du weißt vorher exakt, was du bekommst.'],
                    ['q' => 'Für wen lohnt sich Prozessoptimierung?', 'a' => 'Für jedes Unternehmen mit wiederkehrenden manuellen Abläufen: Angebotserstellung, Rechnungsverarbeitung, Datenpflege, Reportings. Schon wenige automatisierte Stunden pro Woche amortisieren die Beratung meist in Monaten.'],
                    ['q' => 'Setzt ihr die Empfehlungen auch um?', 'a' => 'Ja – das unterscheidet uns von reinen Beratern. Als Software-Agentur implementieren wir Automatisierungen, Integrationen und Tools direkt selbst. Oder wir begleiten dein internes Team bei der Umsetzung.'],
                    ['q' => 'Arbeitet ihr auch remote?', 'a' => 'Ja. Analyse-Workshops laufen vor Ort in Engerwitzdorf/Linz oder remote per Video. Umsetzung und Betreuung funktionieren vollständig remote – für Kunden in ganz Österreich und Deutschland.'],
                    ['q' => 'Was ist der Unterschied zu einer großen Beratungsfirma?', 'a' => 'Direkter Draht zu den Leuten, die umsetzen – keine Junioren-Armee, keine 100-Seiten-Folien ohne Wirkung. Wir sind Techniker mit Business-Verständnis und haften für Ergebnisse statt nur Empfehlungen zu liefern.'],
                    ['q' => 'Helft ihr auch bei Software-Auswahl (ERP, CRM)?', 'a' => 'Ja. Wir beraten neutral bei der Auswahl von ERP-, CRM- und Branchensoftware, bewerten Angebote technisch und begleiten Einführung, Datenmigration und Schulung.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Kostenloses Erstgespräch</a>
                <a href="/leistungen/software" class="btn btn-neutral text-white">Software-Entwicklung</a>
            </div>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
