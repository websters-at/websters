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
            'title'        => "Websters",
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
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
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
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
