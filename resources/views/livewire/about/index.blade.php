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
        $pageUrl = $siteUrl . '/about';

        // --- SEO Meta ---
        SEOMeta::setTitle('Team Websters – Webagentur aus Linz | Michael, Stevan & Manuel');
        SEOMeta::setDescription('Unser Team: Michael Ruep (DevOps), Stevan Vlajic (UI/UX Webentwicklung) & Manuel Puchner (Webentwicklung). Experten für Webdesign ab 990€ & Individualsoftware ab 3.490€ in Linz.');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webagentur Linz Team',
            'Webdesign Experten Oberösterreich',
            'DevOps Engineer Linz',
            'UI/UX Design Österreich',
            'Webentwickler Linz',
            'Cloud Architekt Österreich',
            'Software Engineer Team',
            'Michael Rep DevOps',
            'Stevan Vlajic Webentwicklung',
            'Manuel Puchner Webentwicklung'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('Team Websters – Webdesign & DevOps Experten aus Linz');
        OpenGraph::setDescription('Michael, Stevan & Manuel: Unser Linzer Team für Webdesign, UI/UX, DevOps & Cloud-Architektur. Ihre Agentur für maßgeschneiderte IT-Lösungen.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        /*
        OpenGraph::addImage($siteUrl . '/assets/websters-full-logo.png', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Websters Team - Michael Ruep, Stevan Vlajic, Manuel Puchner'
        ]);*/

        // --- Twitter Card ---
        TwitterCard::setTitle('Team Websters – Ihre IT-Experten aus Linz');
        TwitterCard::setDescription('Michael (DevOps), Stevan (UI/UX) & Manuel (Webentwicklung) – Ihr Team für Webdesign & Software.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@websters.at');

        // --- JSON-LD (AboutPage + Team) ---
        JsonLd::setType('AboutPage');
        JsonLd::setTitle('Über das Team der Webagentur Websters');
        JsonLd::setDescription('Vorstellung des Websters-Teams: Michael Ruep, Stevan Vlajic und Manuel Puchner – Experten für Webdesign, DevOps und Softwareentwicklung in Linz.');
        JsonLd::setUrl($pageUrl);

        // Team-Mitglieder als Personen
        JsonLd::addValue('about', [
            [
                '@type' => 'Person',
                'name' => 'Michael Rüp',
                'jobTitle' => 'DevOps Engineer & Cloud Architect',
                'description' => 'DevOps Engineer, Software Engineer und Cloud Architekt bei Websters',
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'Webagentur Websters'
                ],
                'knowsAbout' => ['DevOps', 'Cloud Architecture', 'Software Engineering', 'System Administration']
            ],
            [
                '@type' => 'Person',
                'name' => 'Stevan Vlajic',
                'jobTitle' => 'Designer & Software Engineer',
                'description' => 'Design, UI/UX, Webentwicklung und Software Engineering bei Websters',
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'Webagentur Websters'
                ],
                'knowsAbout' => ['UI/UX Design', 'Web Development', 'Software Engineering', 'Graphic Design']
            ],
            [
                '@type' => 'Person',
                'name' => 'Manuel Puchner',
                'jobTitle' => 'Webentwickler & DevOps Engineer',
                'description' => 'Webentwicklung, Software Engineer und DevOps Engineer bei Websters',
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'Webagentur Websters'
                ],
                'knowsAbout' => ['Web Development', 'Software Engineering', 'DevOps', 'Backend Development']
            ]
        ]);

        // Organization-Info
        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Webagentur Websters',
            'description' => 'Webagentur aus Linz mit Fokus auf Webdesign, DevOps und Individualsoftware',
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
