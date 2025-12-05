<?php
use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public function mount(): void {
        $siteUrl = 'https://websters.at';
        $pageUrl = $siteUrl . '/services';

        // --- SEO Meta ---
        SEOMeta::setTitle('Dienstleistungen – Webdesign ab 990€ & Custom Software ab 3.490€ | Websters Linz');
        SEOMeta::setDescription('IT-Consulting, Webdesign & Individualsoftware aus Linz: Webdesign ab 990€, WordPress, Custom Software ab 3.490€, DevOps & Cloud-Lösungen. Komplettpaket für Unternehmen.');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Linz ab 990€',
            'Custom Software Entwicklung',
            'IT-Consulting Oberösterreich',
            'WordPress Agentur',
            'DevOps Dienstleistungen',
            'Cloud Architektur',
            'Webentwicklung Linz',
            'Individualsoftware Österreich',
            'Softwareentwicklung Startup',
            'Prozessoptimierung IT',
            'UI/UX Design',
            'Webagentur Leistungen',
            'Hosting Migration',
            'Laravel Entwicklung'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('Leistungen: Webdesign ab 990€ & Software ab 3.490€ | Websters');
        OpenGraph::setDescription('Ihre Full-Service Webagentur in Linz: Webdesign, Custom Software, IT-Consulting & DevOps. Transparente Preise, maßgeschneiderte Lösungen.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/websters-full-logo.png', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Websters Dienstleistungen - Webdesign & Softwareentwicklung'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('Unsere Leistungen | Webagentur Websters');
        TwitterCard::setDescription('Webdesign ab 990€, Custom Software ab 3.490€, IT-Consulting & DevOps aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/websters-full-logo.png');
        TwitterCard::setSite('@websters.at');

        // --- JSON-LD (ItemList für Services) ---
        JsonLd::setType('ItemList');
        JsonLd::setTitle('Dienstleistungen der Webagentur Websters');
        JsonLd::setDescription('Alle Service-Leistungen im Überblick: Webdesign, Softwareentwicklung, IT-Consulting und DevOps.');
        JsonLd::setUrl($pageUrl);

        // Service-Liste als ItemList-Elemente
        JsonLd::addValue('itemListElement', [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'Webdesign & WordPress Entwicklung',
                    'description' => 'Professionelles Webdesign und WordPress-Entwicklung ab 990€. Responsive Websites, Online-Shops und Landing Pages.',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Webagentur Websters'
                    ],
                    'offers' => [
                        '@type' => 'Offer',
                        'name' => 'Webdesign Starter Paket',
                        'price' => '990',
                        'priceCurrency' => 'EUR'
                    ],
                    'areaServed' => ['AT', 'DE']
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'Custom Software Entwicklung',
                    'description' => 'Maßgeschneiderte Softwarelösungen und Individualsoftware ab 3.490€ für spezifische Geschäftsprozesse.',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Webagentur Websters'
                    ],
                    'offers' => [
                        '@type' => 'Offer',
                        'name' => 'Custom Software Basis',
                        'price' => '3490',
                        'priceCurrency' => 'EUR'
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'IT-Consulting & Prozessoptimierung',
                    'description' => 'Digitale Transformation und Prozessoptimierung für Unternehmen. Analyse, Konzeption und Implementierung von IT-Lösungen.',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Webagentur Websters'
                    ],
                    'offers' => [
                        '@type' => 'Offer',
                        'priceCurrency' => 'EUR',
                        'price' => '0' // Auf Anfrage
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 4,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'DevOps & Cloud Architektur',
                    'description' => 'DevOps Engineering, Cloud-Architektur und System-Infrastruktur. Skalierbare und sichere IT-Umgebungen.',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Webagentur Websters'
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 5,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'UI/UX Design',
                    'description' => 'Benutzerfreundliche Interfaces und optimierte User Experiences für Websites und Web-Apps.',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Webagentur Websters'
                    ]
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 6,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'Webentwicklung mit morderne Frameworks',
                    'description' => 'Moderne Webentwicklung mit modernen Web-Frameworks für performante Web-Anwendungen.',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Webagentur Websters'
                    ]
                ]
            ]
        ]);

        // Zusätzlich: Organization-Info für lokale Suche
        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Webagentur Websters',
            'description' => 'Full-Service Webagentur aus Linz für Webdesign, Softwareentwicklung & IT-Consulting.',
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
                'contactType' => 'customer service',
                'telephone' => '+43 677 63177763',
                'email' => 'office@websters.at'
            ],
            'priceRange' => '€€-€€€'
        ]);
    }
};
?>

<div>
    <livewire:services.components.hero />
    <livewire:services.components.process />

</div>
