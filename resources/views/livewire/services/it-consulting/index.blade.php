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
        $pageUrl = $siteUrl . '/services/consulting';

        // --- SEO Meta ---
        SEOMeta::setTitle('IT-Consulting & Prozessoptimierung Linz | Websters Webagentur');
        SEOMeta::setDescription('IT-Consulting in Oberösterreich: Wir optimieren Ihre Geschäftsprozesse mit maßgeschneiderter IT. Digitale Transformation, Workflow-Automatisierung & Effizienzsteigerung für Unternehmen.');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'IT-Consulting Linz',
            'Prozessoptimierung Österreich',
            'Digitale Transformation Unternehmen',
            'Workflow Automatisierung',
            'Geschäftsprozess-Optimierung',
            'IT-Beratung Oberösterreich',
            'Business Process Optimization',
            'Software Implementierung Beratung',
            'Digitalisierungsberatung Linz',
            'Effizienzsteigerung IT',
            'IT-Strategie Entwicklung',
            'Change Management IT',
            'Systemintegration Beratung',
            'MVP Entwicklung Beratung Startups'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('IT-Consulting & Prozessoptimierung aus Linz | Websters');
        OpenGraph::setDescription('Wir optimieren Ihre Geschäftsprozesse durch strategische IT-Beratung. Digitale Transformation für Unternehmen in Österreich.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/websters-full-logo.png', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'IT-Consulting und Prozessoptimierung Dienstleistungen'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('IT-Consulting für Prozessoptimierung | Websters');
        TwitterCard::setDescription('Digitale Transformation und Geschäftsprozess-Optimierung aus Linz. Wir machen Ihr Unternehmen effizienter.');
        TwitterCard::setImage($siteUrl . '/assets/websters-full-logo.png');
        TwitterCard::setSite('@websters.at');

        // --- JSON-LD (Service mit spezifischer Beratung) ---
        JsonLd::setType('Service');
        JsonLd::setTitle('IT-Consulting und Prozessoptimierung Dienstleistungen');
        JsonLd::setDescription('Professionelle IT-Beratung für digitale Transformation und Geschäftsprozess-Optimierung in Unternehmen.');
        JsonLd::setUrl($pageUrl);

        // Spezifische Service-Details für Beratung
        JsonLd::addValue('serviceType', 'ConsultingService');
        JsonLd::addValue('category', 'BusinessConsulting');

        // Anbieter-Informationen
        JsonLd::addValue('provider', [
            '@type' => 'ProfessionalService',
            'name' => 'Webagentur Websters',
            'description' => 'IT-Consulting und Prozessoptimierung Spezialisten aus Linz',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/websters-full-logo.png',
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
                'email' => 'office@websters.at',
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],
            'employee' => [
                [
                    '@type' => 'Person',
                    'name' => 'Michael Ruep',
                    'jobTitle' => 'DevOps Engineer & Cloud Architect',
                    'knowsAbout' => ['Cloud Architecture', 'System Infrastructure', 'IT Strategy']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Stevan Vlajic',
                    'jobTitle' => 'UI/UX Designer & Software Engineer',
                    'knowsAbout' => ['User Experience', 'Digital Workflows', 'Process Design']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Manuel Puchner',
                    'jobTitle' => 'Webentwickler & DevOps Engineer',
                    'knowsAbout' => ['Software Implementation', 'Process Automation', 'System Integration']
                ]
            ]
        ]);

        // Beratungsangebote mit Preis "Auf Anfrage"
        JsonLd::addValue('offers', [
            [
                '@type' => 'Offer',
                'name' => 'IT-Consulting Initial-Analyse',
                'description' => 'Erstanalyse Ihrer Geschäftsprozesse und Identifikation von Optimierungspotenzialen.',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'priceCurrency' => 'EUR',
                    'price' => '0' // Auf Anfrage
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Prozessanalyse'
                ]
            ],
            [
                '@type' => 'Offer',
                'name' => 'Digitale Transformations-Beratung',
                'description' => 'Strategische Beratung zur digitalen Transformation Ihres Unternehmens.',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'priceCurrency' => 'EUR',
                    'price' => '0' // Auf Anfrage
                ]
            ],
            [
                '@type' => 'Offer',
                'name' => 'Workflow-Automatisierung',
                'description' => 'Konzeption und Implementierung automatisierter Arbeitsabläufe.',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'priceCurrency' => 'EUR',
                    'price' => '0' // Auf Anfrage
                ]
            ]
        ]);

        // Beratungsbereiche
        JsonLd::addValue('areaServed', [
            ['@type' => 'State', 'name' => 'Oberösterreich'],
            ['@type' => 'State', 'name' => 'Niederösterreich'],
            ['@type' => 'State', 'name' => 'Salzburg'],
            ['@type' => 'State', 'name' => 'Steiermark'],
            ['@type' => 'State', 'name' => 'Tirol'],
            ['@type' => 'Country', 'name' => 'Österreich'],
            ['@type' => 'Country', 'name' => 'Deutschland']
        ]);

        // Spezifische Beratungsthemen
        JsonLd::addValue('hasOfferCatalog', [
            '@type' => 'OfferCatalog',
            'name' => 'IT-Consulting Dienstleistungen',
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Prozessanalyse & Optimierung',
                        'description' => 'Analyse und Optimierung von Geschäftsprozessen'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Software-Auswahl & Implementierung',
                        'description' => 'Beratung bei Softwareauswahl und Implementierung'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Digitalisierungsstrategie',
                        'description' => 'Entwicklung einer Digitalisierungsstrategie'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'IT-Infrastruktur Consulting',
                        'description' => 'Beratung zur IT-Infrastruktur'
                    ]
                ]
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
