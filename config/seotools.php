<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Webagentur Websters",
            'titleBefore'  => false,
            'description'  => 'Webagentur aus Linz: WordPress-Entwicklung, Custom Software, Webdesign, Logo-Design, Branding, Fotografie, Hosting & Website-Migration. Komplette Webentwicklung von A-Z.',
            'separator'    => ' - ',
            'keywords'     => [
                'Webagentur Linz', 'Webentwicklung Oberösterreich', 'WordPress Entwicklung', 'Webdesign Linz', 'Custom Software',
                'Logo Design', 'Branding', 'Webhosting', 'Website Migration', 'SPA Entwicklung',
                'Laravel', 'NextJS', 'React', 'Tailwind CSS', 'Docker', 'Kubernetes',
                'Webentwicklung Oberösterreich', 'Webagentur Österreich'
            ],
            'canonical'    => 'full',
            'robots'       => 'all',
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => 'google-site-verification=pGh45u7BdgfhkpzFjUQm1T6RdzQTWRGJpF4aczKHTgo',
            'bing'      => null, # same as google because of import
            'alexa'     => null, # not needed anymore
            'pinterest' => null,
            'yandex'    => "a3d23409dbeb72e9",
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Websters - Webentwickler aus Linz',
            'description' => 'Professionelle Webagntur aus Linz: WordPress-Entwicklung, Custom Software, Webdesign, Logo-Design, Branding, Fotografie, Hosting & Website-Migration. Komplette Webentwicklung von A-Z.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Webagentur Websters',
            'images'      => [
            //    asset('assets/websters-full-logo.png') => ['width' => 400, 'height' => 400],
            ],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'        => "Websters",
            'description' => 'Webagentur aus Linz: WordPress-Entwicklung, Custom Software, Webdesign, Logo-Design, Branding, Fotografie, Hosting & Website-Migration. Komplette Webentwicklung von A-Z.', // set false to total remove
            'url'         => 'full', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'Organization',
            'images'      => [
              //  asset('assets/websters-full-logo.png') => ['width' => 400, 'height' => 400],
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Auswiesenstraße 95',
                'addressLocality' => 'Linz',
                'postalCode' => '4300',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => ['German']
            ],
        ],
    ],
];
