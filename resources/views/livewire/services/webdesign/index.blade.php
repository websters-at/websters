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
        $pageUrl = $siteUrl . '/services/webdesign';

        // --- SEO Meta ---
        SEOMeta::setTitle('Webdesign Linz – Professionelle Websites ab 990€ | Websters Webagentur');
        SEOMeta::setDescription('Webdesign Agentur in Linz: Website Starter (990€), Komplett (1.990€) & Premium (>2.990€). Responsive Design, SEO-Optimierung & WordPress Entwicklung. Kostenloses Beratungsgespräch!');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Linz ab 990€',
            'Website Starter Paket Linz',
            'WordPress Entwicklung Österreich',
            'Responsive Webdesign Agentur',
            'SEO optimierte Website',
            'Webagentur Linz Preise',
            'Website Komplett Paket 1990€',
            'Premium Webdesign Oberösterreich',
            'Landingpage Entwicklung',
            'Web-App Entwicklung',
            'Moderne Website erstellen',
            'Website Relaunch Linz',
            'OnePager Webdesign'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('Webdesign Linz – Websites ab 990€ | Websters');
        OpenGraph::setDescription('Starter (990€), Komplett (1.990€) & Premium (>2.990€) Pakete. Professionelles Webdesign aus Linz mit SEO & Responsive Design.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Webdesign Dienstleistungen von Websters Linz'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('Webdesign Linz ab 990€ | Websters');
        TwitterCard::setDescription('Starter: 990€, Komplett: 1.990€, Premium: >2.990€. Professionelles Webdesign aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@websters.at');

        // --- JSON-LD Structured Data (KRITISCH für Preise!) ---
        JsonLd::setType('Service');
        JsonLd::setTitle('Webdesign Dienstleistungen in Linz');
        JsonLd::setDescription('Professionelles Webdesign und WordPress Entwicklung mit drei transparenten Preispaketen: Starter, Komplett und Premium.');
        JsonLd::setUrl($pageUrl);

        // Service-Anbieter (Ihre Firma)
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
            'areaServed' => [
                ['@type' => 'State', 'name' => 'Oberösterreich'],
                ['@type' => 'Country', 'name' => 'Österreich']
            ]
        ]);

        // Detaillierte Preispakete als Angebote
        JsonLd::addValue('offers', [
            // Starter Paket
            [
                '@type' => 'Offer',
                'name' => 'Website Starter Paket',
                'description' => 'Ansprechender OnePager mit 1-3 Unterseiten, responsivem Design und Kontaktformular. Ideal für erste Online-Präsenz.',
                'price' => '990',
                'priceCurrency' => 'EUR',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'price' => '990',
                    'priceCurrency' => 'EUR'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Website Starter',
                    'description' => 'Basispaket für moderne Unternehmenswebsites'
                ],
                'includes' => [
                    '1-3 Unterseiten',
                    'Responsives Design',
                    'Kontaktformular',
                    'Mehrsprachige Option'
                ],
                'availability' => 'https://schema.org/InStock'
            ],
            // Komplett Paket
            [
                '@type' => 'Offer',
                'name' => 'Website Komplett Paket',
                'description' => 'All-in-One Lösung für wachsende Unternehmen mit bis zu 8 Seiten, SEO-Optimierung und schnellem Launch in 4-6 Wochen.',
                'price' => '1990',
                'priceCurrency' => 'EUR',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'price' => '1990',
                    'priceCurrency' => 'EUR'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Website Komplett',
                    'description' => 'Komplettpaket für umfassende Unternehmenswebsites'
                ],
                'includes' => [
                    'Bis zu 8 Seiten',
                    'SEO-Optimierung',
                    'Mehrsprachige Umsetzung',
                    'Schneller Launch (4-6 Wochen)'
                ],
                'availability' => 'https://schema.org/InStock'
            ],
            // Premium Paket
            [
                '@type' => 'Offer',
                'name' => 'Website Premium Paket',
                'description' => 'Individuelle Premium-Lösung mit unbegrenzten Seiten, Custom Software Features und Premium Support für anspruchsvolle Projekte.',
                'price' => '2990',
                'priceCurrency' => 'EUR',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'minPrice' => '2990',
                    'maxPrice' => '10000',
                    'priceCurrency' => 'EUR'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Website Premium',
                    'description' => 'Individuelle Premium-Lösung mit erweiterten Features'
                ],
                'includes' => [
                    'Unbegrenzte Seiten',
                    'Premium Design',
                    'Custom Software Features',
                    'Premium Support'
                ],
                'availability' => 'https://schema.org/InStock'
            ]
        ]);

        // Verfügbare Standorte
        JsonLd::addValue('availableChannel', [
            '@type' => 'ServiceChannel',
            'serviceLocation' => [
                '@type' => 'Place',
                'name' => 'Websters Linz',
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
