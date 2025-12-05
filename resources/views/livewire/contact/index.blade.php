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
        $pageUrl = $siteUrl . '/contact';

        // --- SEO Meta ---
        SEOMeta::setTitle('Kontakt & Anfahrt | Webagentur Websters in Linz/Außertreffling');
        SEOMeta::setDescription('Ihre Webagentur in Oberösterreich: Kontaktieren Sie uns für Webdesign ab 990€, Individualsoftware ab 3.490€ & IT-Consulting. Kostenlose Erstberatung unter +43 677 63177763.');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webagentur kontaktieren Linz',
            'Webdesign Agentur Anfahrt Oberösterreich',
            'Softwareentwicklung Kontakt',
            'IT-Consulting Termin vereinbaren',
            'Websters Linz Adresse',
            'Kostenlose Beratung Webdesign',
            'Individualsoftware Entwicklung Anfrage',
            'Prozessoptimierung Beratungstermin',
            'Außertreffling Webagentur',
            'Linz Webentwicklung Kontakt'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('Kontakt & Anfahrt | Webagentur Websters Linz');
        OpenGraph::setDescription('Kontaktieren Sie uns für Webdesign, Softwareentwicklung & IT-Consulting. Libellenweg 13, 4209 Außertreffling bei Linz.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Kontakt Webagentur Websters in Außertreffling bei Linz'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('Kontakt | Webagentur Websters Linz');
        TwitterCard::setDescription('Webdesign, Software & IT-Consulting aus Oberösterreich. Jetzt Beratungstermin vereinbaren!');
        TwitterCard::setImage($siteUrl . '/assets/logo-og.jpg');
        TwitterCard::setSite('@websters.at');

        // --- JSON-LD (LocalBusiness für Kontaktseite) ---
        JsonLd::setType('LocalBusiness');
        JsonLd::setTitle('Webagentur Websters - Kontakt & Standort');
        JsonLd::setDescription('Webagentur für Webdesign, Individualsoftware und IT-Consulting in Außertreffling bei Linz, Österreich.');
        JsonLd::setUrl($pageUrl);

        // Vollständige Geschäftsinformationen
        JsonLd::addValues([
            'name' => 'Webagentur Websters',
            'description' => 'Webagentur für Webdesign, Individualsoftware und IT-Consulting in Oberösterreich.',
            'image' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'telephone' => '+43 677 63177763',
            'email' => 'office@websters.at',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.338742140853945,
                'longitude' => 14.343424971406712
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],
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
            'priceRange' => '€€-€€€',
            'areaServed' => [
                [
                    '@type' => 'State',
                    'name' => 'Oberösterreich'
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Österreich'
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Deutschland'
                ]
            ],
            'sameAs' => [
                'https://www.instagram.com/websters.at/',
                'https://github.com/websters-at'
            ],
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
