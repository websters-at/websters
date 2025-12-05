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

        // --- Meta / Basis SEO ---
        SEOMeta::setTitle('Webagentur Websters | Webdesign, IT-Consulting & Individualsoftware aus Linz');
        SEOMeta::setDescription(
            'Webagentur aus Linz: Wir entwickeln maßgeschneiderte Webdesign-Lösungen mit WordPress, erstellen Custom Software ab 3.490€ & optimieren mit IT-Consulting Ihre Geschäftsprozesse – für Startups & Unternehmen in Österreich.'
        );
        SEOMeta::setCanonical($siteUrl);
        SEOMeta::addKeyword([
            'Webagentur Linz',
            'Webdesign Linz ab 990€',
            'IT-Consulting Oberösterreich',
            'Individualsoftware Entwicklung',
            'Custom Software ab 3490€',
            'Laravel Entwicklung Österreich',
            'WordPress Agentur Linz',
            'Prozessoptimierung mit IT',
            'Softwareentwicklung für Startups',
            'Web-Apps Entwicklung'
        ]);

        // --- OpenGraph / Social Sharing ---
        OpenGraph::setTitle('Websters – Webdesign & Individualsoftware aus Linz');
        OpenGraph::setDescription(
            'Webdesign ab 990€ & Custom Software ab 3.490€. Ihre Agentur für WordPress, Laravel & IT-Consulting in Linz. Prozessoptimierung für Unternehmen.'
        );
        OpenGraph::setUrl($siteUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');

        // Optimierte Bilder für Social Media
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Webdesign & Development von Websters Linz'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('Webagentur Websters | Linz');
        TwitterCard::setDescription('Webdesign, IT-Consulting & Individualsoftware aus Linz');
        TwitterCard::setUrl($siteUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency'); // Ihr Instagram als Twitter-Handle

        // --- JSON-LD Structured Data (VERBESSERT) ---
        JsonLd::setType('ProfessionalService');
        JsonLd::setTitle('Webagentur Websters - IT-Dienstleistungen aus Linz');
        JsonLd::setDescription('Webdesign, IT-Consulting und Individualsoftware-Entwicklung mit Sitz in Außertreffling bei Linz.');
        JsonLd::setUrl($siteUrl);

        // KORRIGIERTE ADRESSE (basierend auf Ihren Google Maps Daten)
        JsonLd::addValues([
            'address' => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
                'postalCode'      => '4209',
                'addressRegion'   => 'Oberösterreich',
                'addressCountry'  => 'AT',
            ],
            'contactPoint' => [
                '@type'             => 'ContactPoint',
                'contactType'       => 'customer service',
                'availableLanguage' => ['German'],
                'telephone' => '+43 677 63177763',
                'email'     => 'office@websters.at',
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],
            // NEU: Geo-Koordinaten aus Ihrer Google Maps URL
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.338742140853945,
                'longitude' => 14.343424971406712
            ],
            // NEU: Preisbereich und Angebote
            'priceRange' => '€€-€€€',
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

        JsonLd::addImage($siteUrl . '/assets/images/logo-jsonld.jpg');
    }

};
?>


<div>

    <livewire:home.components.hero/>

    <livewire:home.components.about/>
    <livewire:home.components.technologies/>
    <livewire:home.components.team/>
    <livewire:home.components.services/>
    <livewire:home.components.contact/>
    <livewire:home.components.qa/>
    <livewire:home.components.newsletter/>


</div>
