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
        SEOMeta::setTitle('Webdesign & Softwareentwicklung aus Linz | Webagentur Websters');
        SEOMeta::setDescription(
            'Webdesign ab 990€, individuelle Softwareentwicklung ab 3.490€ & IT-Consulting aus Linz für Unternehmen und Startups in Österreich.'
        );
        SEOMeta::setCanonical($siteUrl);
        SEOMeta::addKeyword([
            'Webagentur Linz',
            'Webdesign Linz',
            'Softwareentwicklung Linz',
            'IT-Consulting Österreich',
            'Individualsoftware Entwicklung',
            'Laravel Agentur Linz',
            'WordPress Agentur Linz',
            'Custom Software ab 3490€',
            'Prozessoptimierung IT',
            'Web Entwicklung Oberösterreich'
        ]);

        OpenGraph::setTitle('Webdesign & Softwareentwicklung | Webagentur Websters');
        OpenGraph::setDescription(
            'Professionelles Webdesign ab 990€ & Custom Software ab 3.490€ – Ihre Agentur für WordPress, Laravel & IT-Consulting aus Linz.'
        );
        OpenGraph::setUrl($siteUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Webdesign & Development – Webagentur Websters Linz'
        ]);

        TwitterCard::setTitle('Webdesign & Softwareentwicklung aus Linz | Websters');
        TwitterCard::setDescription('Webdesign ab 990€, IT-Consulting & individuelle Softwareentwicklung aus Linz.');
        TwitterCard::setUrl($siteUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

// --- JSON-LD ---
        JsonLd::setType('ProfessionalService');
        JsonLd::setTitle('Webagentur Websters – Webdesign & Softwareentwicklung aus Linz');
        JsonLd::setDescription('Webdesign, Softwareentwicklung & IT-Consulting aus Außertreffling bei Linz.');
        JsonLd::setUrl($siteUrl);

        JsonLd::addValues([
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT',
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
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.338742140853945,
                'longitude' => 14.343424971406712
            ],
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
