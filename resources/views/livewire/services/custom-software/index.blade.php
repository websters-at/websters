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
        $pageUrl = route('software');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Individualsoftware Entwicklung Linz – Custom Software ab 3.490€');
        SEOMeta::setDescription(
            'Individuelle Softwarelösungen aus Linz: Web-Apps, Prozess-Tools & Business-Software ab 3.490€. Maßgeschneiderte Entwicklung für Unternehmen & Startups.'
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

        OpenGraph::setTitle('Individualsoftware Entwicklung ab 3.490€ | Websters Linz');
        OpenGraph::setDescription('Custom Software, Web-Apps & Prozesslösungen aus Linz. Maßgeschneidert für Unternehmen und Startups.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Individualsoftware Entwicklung von Websters Linz'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Custom Software Entwicklung ab 3.490€ | Websters');
        TwitterCard::setDescription('Individuelle Softwarelösungen für Unternehmen & Startups aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (GOOGLE-VALIDES SOFTWARE DEVELOPMENT SCHEMA)
        |--------------------------------------------------------------------------
        */

        JsonLd::setType('Service');
        JsonLd::setTitle('Individualsoftware Entwicklung');
        JsonLd::setDescription('Custom Software, Web-Apps & Business-Lösungen für Unternehmen.');
        JsonLd::setUrl($pageUrl);

        /*
        |--------------------------------------------------------------------------
        | PROVIDER (DEIN UNTERNEHMEN)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('provider', [
            '@type' => 'Organization',
            'name' => 'Webagentur Websters',
            'description' => 'Spezialisiert auf individuelle Softwareentwicklung in Österreich',
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
        ]);

        /*
        |--------------------------------------------------------------------------
        | OFFERS – PREISMODELLE (Richtig strukturiert)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('offers', [
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
        ]);

        /*
        |--------------------------------------------------------------------------
        | TECH STACK
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('knowsAbout', [
            'Languages'    => ['PHP', 'Typescript', 'JavaScript', 'Python'],
            'Frameworks'   => ['Laravel', 'Livewire', 'Vue.js', 'React', 'Next.js'],
            'Databases'    => ['MySQL', 'PostgreSQL', 'SQLite'],
            'Tools'        => ['Git', 'Docker', 'AWS', 'DigitalOcean'],
            'Methods'      => ['Agile', 'Scrum', 'TDD']
        ]);

        /*
        |--------------------------------------------------------------------------
        | AUDIENCE
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('audience', [
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
