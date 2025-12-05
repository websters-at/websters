<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = route('consulting');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('IT-Consulting Linz – Prozessoptimierung & Digitalisierung | Websters');
        SEOMeta::setDescription(
            'IT-Consulting aus Linz: Prozessoptimierung, digitale Transformation, Automatisierung & IT-Strategie. Optimieren Sie Ihre Geschäftsprozesse nachhaltig.'
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

        OpenGraph::setTitle('IT-Consulting & Prozessoptimierung aus Linz | Websters');
        OpenGraph::setDescription('Strategische IT-Beratung zur digitalen Transformation & Prozessoptimierung. Für Unternehmen in Österreich & Deutschland.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'IT-Consulting und Prozessoptimierung – Webagentur Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('IT-Consulting & Prozessoptimierung | Webagentur Websters');
        TwitterCard::setDescription('Digitale Transformation, Prozessanalyse & Automatisierung für Unternehmen in Österreich.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (Google-valid, korrigiert & optimiert)
        |--------------------------------------------------------------------------
        */

        JsonLd::setType('Service');
        JsonLd::setTitle('IT-Consulting & Prozessoptimierung');
        JsonLd::setDescription('IT-Beratung für digitale Transformation, Effizienzsteigerung & Prozessoptimierung.');
        JsonLd::setUrl($pageUrl);

        JsonLd::addValue('serviceType', 'IT Consulting');
        JsonLd::addValue('category', 'BusinessConsulting');

        /*
        |--------------------------------------------------------------------------
        | PROVIDER (DEIN UNTERNEHMEN)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('provider', [
            '@type' => 'ProfessionalService',
            'name' => 'Webagentur Websters',
            'description' => 'IT-Consulting & Prozessoptimierung für Unternehmen in Österreich',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
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
        ]);

        /*
        |--------------------------------------------------------------------------
        | OFFERS (BERATUNG – PREIS AUF ANFRAGE)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('offers', [
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
        ]);

        /*
        |--------------------------------------------------------------------------
        | REGIONS / ZIELGEBIETE
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('areaServed', [
            ['@type' => 'State', 'name' => 'Oberösterreich'],
            ['@type' => 'Country', 'name' => 'Österreich'],
            ['@type' => 'Country', 'name' => 'Deutschland']
        ]);

        /*
        |--------------------------------------------------------------------------
        | OFFER KATALOG (THEMENBEREICHE)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('hasOfferCatalog', [
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
        ]);
    }
};
?>

<div class="min-h-screen flex items-center justify-center bg-slate-50">
    <section class="pt-12 lg:pt-16 pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 flex flex-col items-center">
            <div
                class="mx-auto mt-6 bg-gradient-to-b from-slate-800 to-slate-600 bg-clip-text text-center text-4xl font-semibold text-transparent sm:w-4/5 md:w-3/5 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-1/2"
            >

            </div>
            <div
                class="mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-full bg-slate-200 px-8 py-2"
            >
      <span
          class="bg-gradient-to-b bg-primary from-slate-800 to-slate-600 bg-clip-text text-3xl font-semibold text-transparent lg:py-1.5 lg:text-5xl"
      >
in arbeit
</span>
            </div>

            <x-button
                link="/"
                label="zurück zur startseite"
                class="btn-primary mt-10"
            >
            </x-button>
        </div>
    </section>
</div>
