<?php
/**
 * Volloptimierte SEO-Konfiguration für Artesaos/SEOTools
 * Websters - Engerwitzdorf, Österreich
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),

    'meta' => [
        'defaults' => [
            // Wird als Standard-Brand-Title verwendet und an Seitentitel angehängt
            'title'       => 'Websters',
            'titleBefore'  => false,

            // ~150 Zeichen, fokussiert auf Kern-Keywords (AT + DE)
            'description'  => 'Websters aus Engerwitzdorf für Webdesign, Webentwicklung, Individualsoftware & IT-Consulting – digitale Lösungen für Unternehmen in Österreich & Deutschland.',
            'separator'   => ' | ',   // oder ' – '


            // Meta-Keywords spielen für Google kaum noch eine Rolle,
            // sind aber sauber auf Wunsch-Keywords für AT/DE optimiert
            'keywords'     => [
                'Websters Engerwitzdorf',
                'Webdesign Oberösterreich',
                'Webdesign Agentur',
                'Webentwicklung Oberösterreich',
                'Softwareentwicklung Oberösterreich',
                'Individualsoftware Oberösterreich',
                'IT-Consulting Oberösterreich',
                'Webagentur Oberösterreich',
                'Webdesign Oberösterreich',
                'Homepage erstellen lassen',
                'Website erstellen Oberösterreich',
                'WordPress Agentur',
                'Webapplikationen Entwicklung',
                'Digitalisierungsberatung Oberösterreich',
                'Agentur für Startups',
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
            'title'       => 'Webdesign ab 990€ & Softwareentwicklung | Websters',
            'description' => 'Websters aus Engerwitzdorf für Webdesign ab 990€, individuelle Webentwicklung, Custom Software ab 3.490€ & IT-Consulting für Unternehmen in Österreich & Deutschland.',
            'url'         => false,
            'type'        => 'website',
            'site_name'   => 'Websters',
            'locale'      => 'de_AT',
            'images'      => [
                'https://websters.at/assets/logo-og.jpg',
            ],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card'        => 'summary_large_image',

            // Falls ihr keinen X/Twitter-Account habt, bewusst auf null gelassen
            'site'        => null,
            'creator'     => null,

            'title'       => 'Websters – Webdesign & Softwareentwicklung aus Engerwitzdorf',
            'description' => 'Webdesign ab 990€, individuelle Webentwicklung & Custom Software ab 3.490€ für Unternehmen in Österreich & Deutschland.',
            'image'       => 'https://websters.at/assets/logo-jsonld.jpg',
        ],
    ],

    'json-ld' => [
        'defaults' => [
            // Absichtlich leer: Ein globaler LocalBusiness-Blob würde auf JEDER Seite
            // rendern und per array_merge sogar setType() der Seiten überstimmen
            // (deshalb zeigten alle Seiten LocalBusiness statt Article/Service).
            // Organisation/Website stehen global im Layout, Details pro Seite im Mount.
        ],
    ],
];
