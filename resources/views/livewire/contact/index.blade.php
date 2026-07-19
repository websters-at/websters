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
        $pageUrl = route('contact');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        | Kürzer, schärfer, perfekte Länge (40–60 Zeichen).
        */

        SEOMeta::setTitle('Kontakt');
        SEOMeta::setDescription(
            'Kontaktieren Sie Websters für Webdesign ab 990€, Individualsoftware ab 3.490€ & IT-Consulting. Kostenlose Erstberatung unter +43 677 63177763.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Websters Kontakt',
            'Webdesign Agentur Oberösterreich',
            'Softwareentwicklung Anfrage',
            'IT-Consulting Termin Linz',
            'Websters Adresse',
            'Webdesign Beratung kostenlos',
            'Individualsoftware Entwicklung Kontakt',
            'Prozessoptimierung Beratung',
            'Engerwitzdorf Webagentur',
            'Webentwicklung Linz Kontakt'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Kontakt | Websters');
        OpenGraph::setDescription(
            'Ihre Ansprechstelle für Webdesign, Softwareentwicklung & IT-Consulting in Engerwitzdorf. Jetzt unverbindlich Kontakt aufnehmen.'
        );
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Websters – Kontakt und Standort'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Kontakt | Websters');
        TwitterCard::setDescription('Webdesign, Softwareentwicklung & IT-Consulting aus Oberösterreich. Jetzt Termin vereinbaren.');
        TwitterCard::setImage($siteUrl . '/assets/logo-og.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (LOCAL BUSINESS SCHEMA)
        |--------------------------------------------------------------------------
        | Vollständig, sauber strukturiert, perfekt für Google Maps & Local SEO.
        */

        JsonLd::setType('LocalBusiness');
        JsonLd::setTitle('Websters – Kontakt & Standort');
        JsonLd::setDescription('Webdesign, Individualsoftware & IT-Consulting aus Engerwitzdorf.');
        JsonLd::setUrl($pageUrl);

        JsonLd::addValues([
            'name' => 'Websters',
            'description' => 'IT-Dienstleistung, Webdesign, Softwareentwicklung & Medienproduktion und IT-Consulting in Oberösterreich.',
            'image' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'telephone' => '+43 677 63177763',
            'email' => 'office@websters.at',

            // Adresse + GEO-Koordinaten
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Engerwitzdorf',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.338742140853945,
                'longitude' => 14.343424971406712
            ],

            // Öffnungszeiten
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],

            // Kontaktpunkt
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
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

            // Preise & Regionen
            'priceRange' => '€€-€€€',
            'areaServed' => [
                ['@type' => 'State', 'name' => 'Oberösterreich'],
                ['@type' => 'Country', 'name' => 'Österreich'],
                ['@type' => 'Country', 'name' => 'Deutschland']
            ],

            // Social Media
            'sameAs' => [
                'https://www.instagram.com/websters.at/',
                'https://github.com/websters-at'
            ],

            // Angebote
            'makesOffer' => [
                [
                    '@type' => 'Offer',
                    'name' => 'Webdesign Starter',
                    'price' => '990',
                    'priceCurrency' => 'EUR'
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Custom Software Entwicklung',
                    'price' => '3490',
                    'priceCurrency' => 'EUR'
                ]
            ]
        ]);
    }
};
?>
<div>
    <livewire:contact.components.cal/>
    <livewire:contact.components.contact-data/>
    <livewire:home.components.newsletter/>



</div>
