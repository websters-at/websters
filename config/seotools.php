<?php
/**
 * Volloptimierte SEO-Konfiguration für Artesaos/SEOTools
 * Webagentur Websters - Linz/Außertreffling, Österreich
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),

    'meta' => [
        'defaults' => [
            // Wird als Standard-Brand-Title verwendet und an Seitentitel angehängt
            'title'       => 'Webagentur Websters',
            'titleBefore'  => false,

            // ~150 Zeichen, fokussiert auf Kern-Keywords (AT + DE)
            'description'  => 'Webagentur in Linz für Webdesign, Webentwicklung, Individualsoftware & IT-Consulting – digitale Lösungen für Unternehmen in Österreich & Deutschland.',
            'separator'   => ' | ',   // oder ' – '


            // Meta-Keywords spielen für Google kaum noch eine Rolle,
            // sind aber sauber auf Wunsch-Keywords für AT/DE optimiert
            'keywords'     => [
                'Webagentur Linz',
                'Webdesign Linz',
                'Webdesign Agentur Linz',
                'Webentwicklung Linz',
                'Softwareentwicklung Linz',
                'Individualsoftware Linz',
                'IT-Consulting Linz',
                'Webagentur Oberösterreich',
                'Webdesign Oberösterreich',
                'Homepage erstellen lassen Linz',
                'Website erstellen Linz',
                'WordPress Agentur Linz',
                'Webapplikationen Entwicklung',
                'Digitalisierungsberatung Oberösterreich',
                'Agentur für Startups Linz',
            ],

            // "full" = aktuelle URL inkl. Query als Canonical
            'canonical'    => 'full',

            // Moderne Robots-Settings mit maximalem Snippet & Image Preview
            'robots'       => 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1',
        ],

        'webmaster_tags' => [
            // Nur der Verifizierungs-Code, ohne "google-site-verification="
            'google'    => 'pGh45u7BdgfhkpzFjUQm1T6RdzQTWRGJpF4aczKHTgo',
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
            // Starker Social-Titel mit Location + Pricing
            'title'       => 'Webdesign Linz ab 990€ & Softwareentwicklung | Webagentur Websters',
            'description' => 'Webagentur aus Linz für Webdesign ab 990€, individuelle Webentwicklung, Custom Software ab 3.490€ & IT-Consulting für Unternehmen in Österreich & Deutschland.',
            'url'         => false,
            'type'        => 'website',
            'site_name'   => 'Webagentur Websters',
            'locale'      => 'de_AT',
            'images'      => [
                'https://websters.at/assets/images/logo-og.jpg',
            ],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card'        => 'summary_large_image',

            // Falls ihr keinen X/Twitter-Account habt, bewusst auf null gelassen
            'site'        => null,
            'creator'     => null,

            'title'       => 'Webagentur Websters – Webdesign & Softwareentwicklung aus Linz',
            'description' => 'Webdesign ab 990€, individuelle Webentwicklung & Custom Software ab 3.490€ für Unternehmen in Österreich & Deutschland.',
            'image'       => 'https://websters.at/assets/images/logo-jsonld.jpg',
        ],
    ],

    'json-ld' => [
        'defaults' => [
            '@context'    => 'https://schema.org',

            // LocalBusiness ist für eine Webagentur mit physischer Adresse optimal
            '@type'       => 'LocalBusiness',
            '@id'         => 'https://websters.at/#webagentur-websters',

            'name'        => 'Webagentur Websters',
            'description' => 'Webagentur für Webdesign, Webentwicklung, Individualsoftware & IT-Consulting mit Sitz in Außertreffling bei Linz, Österreich.',
            'url'         => 'https://websters.at',
            'telephone'   => '+43 677 63177763',
            'email'       => 'office@websters.at',

            'address' => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
                'postalCode'      => '4209',
                'addressRegion'   => 'Oberösterreich',
                'addressCountry'  => 'AT',
            ],

            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => 48.338742140853945,
                'longitude' => 14.343424971406712,
            ],

            'contactPoint' => [
                '@type'             => 'ContactPoint',
                'contactType'       => 'customer service',
                'availableLanguage' => ['de-AT', 'de-DE'],
                'telephone'         => '+43 677 63177763',
                'email'             => 'office@websters.at',
                'hoursAvailable'    => [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens'     => '09:00',
                    'closes'    => '17:00',
                ],
            ],

            // Angebote mit echten Preisen; "auf Anfrage" ohne Fake-Preis (kein 0€)
            'makesOffer' => [
                [
                    '@type'        => 'Offer',
                    'name'         => 'Webdesign Starter',
                    'description'  => 'Professionelles Webdesign für kleine Unternehmen und Startups.',
                    'price'        => '990',
                    'priceCurrency'=> 'EUR',
                ],
                [
                    '@type'        => 'Offer',
                    'name'         => 'IT-Consulting & Prozessoptimierung',
                    'description'  => 'Digitalisierungsberatung und Prozessoptimierung für Unternehmen.',
                ],
                [
                    '@type'        => 'Offer',
                    'name'         => 'Custom Software Entwicklung',
                    'description'  => 'Maßgeschneiderte Softwarelösungen für spezifische Geschäftsprozesse.',
                    'price'        => '3490',
                    'priceCurrency'=> 'EUR',
                ],
                [
                    '@type'        => 'Offer',
                    'name'         => 'Individualsoftware-Entwicklung',
                    'description'  => 'Komplette Individualsoftware für komplexe Geschäftsanforderungen.',
                ],
            ],

            'sameAs' => [
                'https://www.instagram.com/websters.at/',
                'https://github.com/websters-at',
            ],

            'logo'  => 'https://websters.at/assets/images/logo-jsonld.jpg',
            'image' => [
                'https://websters.at/assets/images/logo-jsonld.jpg',
            ],

            'priceRange' => '€€-€€€',
            'areaServed' => ['AT', 'DE'],
        ],
    ],
];
