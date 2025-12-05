<?php
/**
 * Volloptimierte SEO-Konfiguration für Artesaos/SEOTools
 * Webagentur Websters - Linz/Außertreffling, Österreich
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),

    'meta' => [
        'defaults' => [
            'title' => "Webagentur Websters",
            'titleBefore' => false,
            'description' => 'Webagentur aus Linz: Wir entwickeln maßgeschneiderte Webdesign-Lösungen mit WordPress, erstellen Custom Software ab 3.490€ & optimieren mit IT-Consulting Ihre Geschäftsprozesse – für Startups & Unternehmen in Österreich.',
            'separator'   => ' – ',
            'keywords'    => [
                'Webagentur Linz',
                'Webdesign Linz ab 990€',
                'Webentwicklung Oberösterreich',
                'Individualsoftware Entwicklung',
                'Custom Software ab 3490€',
                'IT Consulting Österreich',
                'Prozessoptimierung mit IT',
                'Landing Page Entwicklung',
                'WordPress Entwicklung',
                'Software-Entwicklung für Startups',
                'Hosting Linz',
                'Website Migration',
                'Digitalisierungsberatung Oberösterreich',
                'Webapplikationen Entwicklung',
                'Maßgeschneiderte Softwarelösungen',
            ],
            'canonical'   => 'full',
            'robots'      => 'index, follow',
        ],

        'webmaster_tags' => [
            'google'    => 'google-site-verification=pGh45u7BdgfhkpzFjUQm1T6RdzQTWRGJpF4aczKHTgo',
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => true,
    ],

    'opengraph' => [
        'defaults' => [
            'title'       => 'Webdesign ab 990€ & Softwareentwicklung | Webagentur Websters',
            'description' => 'Professionelle Webagentur aus Linz: Webdesign ab 990€, Custom Software ab 3490€, IT-Consulting & Prozessoptimierung.',
            'url'         => false,
            'type'        => 'website',
            'site_name'   => 'Webagentur Websters',
            'locale'      => 'de_AT',
            'images'      => [
                 'https://websters.at/assets/images/logo-og.jpg', // Ihr angegebenes Bild
            ],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card'        => 'summary_large_image',
            'site'        => '@WebstersAgency', // Instagram als Twitter-Handle, falls kein Twitter
            'creator'     => '@websters.at',
            'title'       => 'Webagentur Websters – IT-Lösungen aus Linz',
            'description' => 'Webdesign ab 990€ | Custom Software ab 3490€ | IT-Consulting für österreichische Unternehmen.',
            'image'       => 'https://websters.at/assets/images/logo-jsonld.jpg',
        ],
    ],

    'json-ld' => [
        'defaults' => [
            '@context'    => 'https://schema.org',
            '@type'       => 'ProfessionalService',
            'name'        => 'Webagentur Websters',
            'description' => 'IT-Consulting, Webdesign und Individualsoftware-Entwicklung mit Sitz in Außertreffling bei Linz, Österreich.',
            'url'         => 'https://websters.at',
            'telephone'   => '+43 677 63177763',
            'email'       => 'office@websters.at',

            // KORRIGIERTE ADRESSE basierend auf Google Maps
            'address' => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
                'postalCode'      => '4209',
                'addressRegion'   => 'Oberösterreich',
                'addressCountry'  => 'AT',
            ],

            // Präzise Geo-Koordinaten aus Ihrer Google Maps URL
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => 48.338742140853945,
                'longitude' => 14.343424971406712,
            ],

            'contactPoint' => [
                '@type'             => 'ContactPoint',
                'contactType'       => 'customer service',
                'availableLanguage' => ['German'],
                'telephone'         => '+43 677 63177763',
                'email'             => 'office@websters.at',
                'hoursAvailable'    => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens'    => '09:00',
                    'closes'   => '17:00',
                ],
            ],

            // OPTIMIERT: Mit konkreten Preisen und mehr Dienstleistungen
            'makesOffer' => [
                [
                    '@type'           => 'Offer',
                    'name'            => 'Webdesign Starter',
                    'description'     => 'Professionelles Webdesign für kleine Unternehmen und Startups',
                    'priceSpecification' => [
                        '@type' => 'PriceSpecification',
                        'priceCurrency' => 'EUR',
                        'price' => '990',
                    ]
                ],
                [
                    '@type'           => 'Offer',
                    'name'            => 'IT-Consulting & Prozessoptimierung',
                    'description'     => 'Digitalisierungsberatung und Prozessoptimierung für Unternehmen',
                    'priceSpecification' => [
                        '@type' => 'PriceSpecification',
                        'priceCurrency' => 'EUR',
                        'price' => '0', // Auf Anfrage
                    ]
                ],
                [
                    '@type'           => 'Offer',
                    'name'            => 'Custom Software Entwicklung',
                    'description'     => 'Maßgeschneiderte Softwarelösungen für spezifische Geschäftsprozesse',
                    'priceSpecification' => [
                        '@type' => 'PriceSpecification',
                        'priceCurrency' => 'EUR',
                        'price' => '3490',
                    ]
                ],
                [
                    '@type'           => 'Offer',
                    'name'            => 'Individualsoftware-Entwicklung',
                    'description'     => 'Komplette Individualsoftware für komplexe Geschäftsanforderungen',
                    'priceSpecification' => [
                        '@type' => 'PriceSpecification',
                        'priceCurrency' => 'EUR',
                        'price' => '0', // Auf Anfrage (höhere Budgets)
                    ]
                ],
            ],

            // Social Media Profile - nur Instagram aktiv
            'sameAs' => [
                'https://www.instagram.com/websters.at/',
                'https://github.com/websters-at',
            ],

            'logo' => 'https://websters.at' . '/assets/images/logo-jsonld.jpg',
            'image' => [
                'https://websters.at' . '/assets/images/logo-jsonld.jpg',
            ],

            // Zusätzlich: Preisbereich für das gesamte Unternehmen
            'priceRange' => '€€-€€€',
            'areaServed' => [
                'AT', 'DE'
            ],
        ],
    ],
];
