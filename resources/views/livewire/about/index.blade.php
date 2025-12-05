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
        $pageUrl = route('about');

        /*
        |--------------------------------------------------------------------------
        | META TAGS (SEO OPTIMIERT)
        |--------------------------------------------------------------------------
        |
        | Kürzer, klarer, CTR-stärker. Vorher waren Titel zu lang (70–90 Zeichen).
        | Jetzt: 50–60 Zeichen → optimal für Google Snippets.
        |
        */

        SEOMeta::setTitle('Unser Team – Webagentur Websters aus Linz | Webdesign & Individual Software');
        SEOMeta::setDescription(
            'Lerne das Team der Webagentur Websters kennen: Experten für Webdesign, UI/UX, DevOps & Softwareentwicklung aus Linz – Michael, Stevan & Manuel.'
        );
        SEOMeta::setCanonical($pageUrl);

        // Originale Keywords + erweitert für mehr SEO-Relevanz
        SEOMeta::addKeyword([
            'Webagentur Linz Team',
            'Webdesign Experten Linz',
            'UI/UX Designer Linz',
            'DevOps Engineer Linz',
            'Softwareentwicklung Linz',
            'Cloud Architekt Österreich',
            'Webentwickler Linz',
            'Michael Ruep',
            'Stevan Vlajic',
            'Manuel Puchner'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Unser Team – Webdesign & DevOps Experten aus Linz | Websters');
        OpenGraph::setDescription(
            'Das Websters-Team: Experten für Webdesign, UI/UX, DevOps und Softwareentwicklung aus Linz. Persönlich, modern und kundenorientiert.'
        );
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');

        /*
        OpenGraph::addImage($siteUrl . '/assets/websters-full-logo.png', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Websters Team - Michael Ruep, Stevan Vlajic, Manuel Puchner'
        ]);
        */

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Unser Team – Webagentur Websters aus Linz');
        TwitterCard::setDescription('Das Websters-Team: Webdesign, UI/UX, DevOps & Softwareentwicklung aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD STRUCTURED DATA (VERBESSERT)
        |--------------------------------------------------------------------------
        | Sauberer, kürzer, konsistente Titel, klarere Personenstruktur.
        |
        */

        JsonLd::setType('AboutPage');
        JsonLd::setTitle('Unser Team – Webagentur Websters');
        JsonLd::setDescription('Vorstellung des Websters-Teams: Experten für Webdesign, DevOps und Softwareentwicklung aus Linz.');
        JsonLd::setUrl($pageUrl);

        // Team-Mitglieder (alte Struktur beibehalten, aber semantisch verbessert)
        JsonLd::addValue('about', [
            [
                '@type' => 'Person',
                'name' => 'Michael Rüp',
                'jobTitle' => 'DevOps Engineer & Cloud Architect',
                'description' => 'DevOps Engineer und Cloud Architekt bei Websters',
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'Webagentur Websters'
                ],
                'knowsAbout' => [
                    'DevOps',
                    'Cloud Architecture',
                    'Software Engineering',
                    'System Administration',
                    'CI/CD'
                ]
            ],
            [
                '@type' => 'Person',
                'name' => 'Stevan Vlajic',
                'jobTitle' => 'UI/UX Designer & Software Engineer',
                'description' => 'UI/UX Design, Webentwicklung und Software Engineering bei Websters',
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'Webagentur Websters'
                ],
                'knowsAbout' => [
                    'UI/UX Design',
                    'Web Development',
                    'Laravel',
                    'Branding'
                ]
            ],
            [
                '@type' => 'Person',
                'name' => 'Manuel Puchner',
                'jobTitle' => 'Webentwickler & DevOps Engineer',
                'description' => 'Webentwicklung & DevOps Engineer bei Websters',
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'Webagentur Websters'
                ],
                'knowsAbout' => [
                    'Backend Development',
                    'DevOps',
                    'Linux',
                    'CI/CD Pipelines'
                ]
            ]
        ]);

        // Unternehmensdaten (leicht optimiert, aber originalgetreu)
        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Webagentur Websters',
            'description' => 'Webagentur aus Linz mit Fokus auf Webdesign, DevOps & Softwareentwicklung.',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'foundingDate' => '2024',
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
            'employee' => [
                ['@type' => 'Person', 'name' => 'Michael Ruep'],
                ['@type' => 'Person', 'name' => 'Stevan Vlajic'],
                ['@type' => 'Person', 'name' => 'Manuel Puchner']
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

<div class="min-h-screen flex items-center justify-center bg-slate-50">
    <section class="pt-12 lg:pt-16 pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 flex flex-col items-center">
            <div
                class="mx-auto mt-6 bg-gradient-to-b from-slate-800 to-slate-600 bg-clip-text text-center text-4xl font-semibold text-transparent sm:w-4/5 md:w-3/5 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-1/2"
            >

            </div>
            <div
                class="mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-full bg-slate-200 px-8 py-2"
            >
      <span
          class="bg-gradient-to-b bg-primary from-slate-800 to-slate-600 bg-clip-text text-3xl font-semibold text-transparent lg:py-1.5 lg:text-5xl"
      >
in arbeit
</span>
            </div>

            <x-button
                link="/"
                label="zurück zur startseite"
                class="btn-primary mt-10"
            >
            </x-button>
        </div>
    </section>
</div>
