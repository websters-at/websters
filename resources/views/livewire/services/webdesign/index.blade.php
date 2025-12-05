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
        $pageUrl = route('webdesign');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Webdesign Linz – Websites ab 990€ | Webagentur Websters');
        SEOMeta::setDescription(
            'Professionelles Webdesign in Linz: Starter 990€, Komplett 1.990€, Premium ab 2.990€. Responsiv, SEO-optimiert, WordPress & Webdevelopment. Jetzt Beratung sichern!'
        );

        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'Webdesign Linz ab 990€',
            'WordPress Entwicklung Linz',
            'SEO optimierte Website',
            'Responsive Webdesign',
            'Website erstellen Linz',
            'Webagentur Linz Preise',
            'OnePager Webdesign',
            'Landingpage erstellen',
            'Website Komplett Paket',
            'Premium Webdesign Österreich',
            'Webdevelopment Linz',
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Webdesign Linz – Websites ab 990€ | Websters');
        OpenGraph::setDescription('Starter 990€, Komplett 1.990€, Premium ab 2.990€. Webdesign aus Linz mit SEO & Responsive Design.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width'  => 1200,
            'height' => 630,
            'alt'    => 'Webdesign Dienstleistungen von Websters Linz'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Webdesign Linz ab 990€ | Webagentur Websters');
        TwitterCard::setDescription('Starter: 990€, Komplett: 1.990€, Premium ab 2.990€. Professionelles Webdesign aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD SERVICE SCHEMA – KORRIGIERT & GOOGLE-VALID
        |--------------------------------------------------------------------------
        */

        JsonLd::setType('Service');
        JsonLd::setTitle('Webdesign Dienstleistungen in Linz');
        JsonLd::setDescription('Professionelles Webdesign mit transparenten Preisen: Starter, Komplett und Premium.');
        JsonLd::setUrl($pageUrl);

        // Provider (deine Firma)
        JsonLd::addValue('provider', [
            '@type' => 'ProfessionalService',
            'name' => 'Webagentur Websters',
            'description' => 'Webdesign Agentur aus Linz, Österreich',
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
                'contactType' => 'customer service',
                'availableLanguage' => ['German'],
                'telephone' => '+43 677 63177763',
                'email' => 'office@websters.at'
            ],
            'areaServed' => ['AT', 'DE']
        ]);

        /*
        |--------------------------------------------------------------------------
        | OFFERS (PREISMODELLE) – sauber für Google
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('offers', [
            [
                '@type' => 'Offer',
                'name' => 'Website Starter Paket',
                'description' => 'OnePager / kleine Websites (1–3 Seiten), responsiv, inkl. Basis-SEO.',
                'priceCurrency' => 'EUR',
                'price' => 990,
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceCurrency' => 'EUR',
                    'price' => 990
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Website Starter',
                    'description' => 'Basispaket für moderne Unternehmenswebsites'
                ],
                'availability' => 'https://schema.org/InStock'
            ],

            [
                '@type' => 'Offer',
                'name' => 'Website Komplett Paket',
                'description' => 'Bis zu 8 Seiten, SEO-Optimierung, mehrsprachig, Launch in 4–6 Wochen.',
                'priceCurrency' => 'EUR',
                'price' => 1990,
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceCurrency' => 'EUR',
                    'price' => 1990
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Website Komplett',
                    'description' => 'Komplettlösung für wachsende Unternehmen'
                ],
                'availability' => 'https://schema.org/InStock'
            ],

            [
                '@type' => 'Offer',
                'name' => 'Website Premium Paket',
                'description' => 'Unbegrenzte Seiten, Premium Design, Custom Features & Support.',
                'priceCurrency' => 'EUR',
                'price' => 2990,
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceCurrency' => 'EUR',
                    'minPrice' => 2990,
                    'maxPrice' => 10000
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Website Premium',
                    'description' => 'Premium-Websites für anspruchsvolle Projekte'
                ],
                'availability' => 'https://schema.org/InStock'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | SERVICE LOCATION
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('availableChannel', [
            '@type' => 'ServiceChannel',
            'serviceLocation' => [
                '@type' => 'Place',
                'name' => 'Webagentur Websters – Standort Linz',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Außertreffling',
                    'addressRegion' => 'Oberösterreich',
                    'addressCountry' => 'AT'
                ]
            ]
        ]);
    }
};
?>

<div>
    <livewire:services.webdesign.components.intro />
    <livewire:services.webdesign.components.website-package />
    <livewire:services.webdesign.components.process />
    <livewire:services.webdesign.components.website-pricing />
    <livewire:services.webdesign.components.contact/>

    <livewire:services.webdesign.components.qa/>
    <livewire:home.components.newsletter/>




</div>
