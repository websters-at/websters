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
        $pageUrl = $siteUrl . '/services/software';

        // --- SEO Meta ---
        SEOMeta::setTitle('Individual Software Entwicklung Linz | Custom Software ab 3.490€ | Websters');
        SEOMeta::setDescription('Maßgeschneiderte Softwarelösungen aus Linz: Wir entwickeln individuelle Web-Apps, Business-Software & Prozess-Tools ab 3.490€. Komplettlösungen für Unternehmen & Startups.');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Individual Software Entwicklung',
            'Custom Software Linz',
            'Maßgeschneiderte Software',
            'Software-Entwicklung Österreich',
            'Web-App Entwicklung',
            'Business Software Linz',
            'Prozesssoftware Entwicklung',
            'Individuelle Softwarelösung',
            'Software Agentur Oberösterreich',
            'Laravel Entwicklung',
            'Livewire Software',
            'Startup Software Entwicklung',
            'Unternehmenssoftware Individual',
            'Software ab 3490€',
            'Digitalisierung Software',
            'Workflow Automatisierung Software'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('Individual Software Entwicklung ab 3.490€ | Websters Linz');
        OpenGraph::setDescription('Maßgeschneiderte Softwarelösungen für Ihre Geschäftsprozesse. Custom Web-Apps, Business-Tools & individuelle Software aus Linz.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/websters-full-logo.png', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Individual Software Entwicklung von Websters Linz'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('Custom Software Entwicklung ab 3.490€ | Websters');
        TwitterCard::setDescription('Individuelle Softwarelösungen für Unternehmen in Linz und ganz Österreich.');
        TwitterCard::setImage($siteUrl . '/assets/websters-full-logo.png');
        TwitterCard::setSite('@websters.at');

        // --- JSON-LD (SoftwareDevelopment Service) ---
        JsonLd::setType('Service');
        JsonLd::setTitle('Individual Software Entwicklung Dienstleistungen');
        JsonLd::setDescription('Maßgeschneiderte Softwarelösungen und Custom Software Entwicklung für spezifische Geschäftsanforderungen.');
        JsonLd::setUrl($pageUrl);

        // Anbieter-Informationen mit Software-Schwerpunkt
        JsonLd::addValue('provider', [
            '@type' => 'ProfessionalService',
            'name' => 'Webagentur Websters',
            'description' => 'Spezialisiert auf Individual Software Entwicklung in Linz',
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
                'contactType' => 'technical support',
                'availableLanguage' => ['German', 'English'],
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
                [
                    '@type' => 'Person',
                    'name' => 'Michael Ruep',
                    'jobTitle' => 'DevOps Engineer & Cloud Architect',
                    'knowsAbout' => ['Full Stack Development', 'Database Design', 'System Architecture', 'Agile Development']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Stevan Vlajic',
                    'jobTitle' => 'UI/UX Designer & Software Engineer',
                    'knowsAbout' => ['Full Stack Development', 'Database Design', 'System Architecture', 'Agile Development']
                ],
                [
                    '@type' => 'Person',
                    'name' => 'Manuel Puchner',
                    'jobTitle' => 'Webentwickler & DevOps Engineer',
                    'knowsAbout' => ['Full Stack Development', 'Database Design', 'System Architecture', 'Agile Development']
                ]
            ],
            'knowsAbout' => [
                'Laravel Framework',
                'Livewire',
                'Vue.js',
                'React',
                'MySQL/PostgreSQL',
                'RESTful APIs',
                'Microservices',
                'Cloud Deployment',
                'Agile Methodologies',
                'DevOps Practices'
            ]
        ]);

        // Software-Entwicklungsangebote mit konkreten Preisen
        JsonLd::addValue('offers', [
            [
                '@type' => 'Offer',
                'name' => 'Custom Software Basis',
                'description' => 'Individuelle Softwarelösung für spezifische Geschäftsprozesse mit klar definiertem Umfang.',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'priceCurrency' => 'EUR',
                    'price' => '3490',
                    'priceValidUntil' => '2025-12-31'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Basis Software Entwicklung',
                    'description' => 'Maßgeschneiderte Software mit definiertem Funktionsumfang'
                ],
                'includes' => [
                    'Anforderungsanalyse',
                    'Konzeption & Design',
                    'Software-Entwicklung',
                    'Testing & Qualitätssicherung',
                    'Basis-Dokumentation',
                    'Einmaliges Deployment'
                ],
                'availability' => 'https://schema.org/InStock'
            ],
            [
                '@type' => 'Offer',
                'name' => 'Web-App Entwicklung',
                'description' => 'Moderne Web-Applikationen mit responsivem Design und voller Funktionalität.',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'priceCurrency' => 'EUR',
                    'minPrice' => '5990',
                    'maxPrice' => '25000'
                ],
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Web Application Development'
                ]
            ],
            [
                '@type' => 'Offer',
                'name' => 'MVP Entwicklung für Startups',
                'description' => 'Minimal Viable Product Entwicklung für Startups und Geschäftsideen.',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'priceType' => 'SRP',
                    'priceCurrency' => 'EUR',
                    'minPrice' => '7990',
                    'maxPrice' => '15000'
                ]
            ]
        ]);
        // Software-Technologien und Kompetenzen
        JsonLd::addValue('knowsAbout', [
            'Programming Languages' => ['PHP', 'Typescript', 'JavaScript', 'Python', 'SQL'],
            'Frameworks' => ['Laravel', 'Livewire', 'Vue.js','NextJS', 'Laravel', 'React', 'Tailwind CSS'],
            'Databases' => ['MySQL', 'PostgreSQL', 'SQLite'],
            'Development Tools' => ['Git', 'Docker', 'AWS', 'DigitalOcean'],
            'Methodologies' => ['Agile Development', 'Scrum', 'Test-Driven Development']
        ]);

        // Zielbranchen und Anwendungsfälle
        JsonLd::addValue('audience', [
            [
                '@type' => 'Audience',
                'audienceType' => 'Businesses',
                'name' => 'KMU & Unternehmen'
            ],
            [
                '@type' => 'Audience',
                'audienceType' => 'Startups',
                'name' => 'Startups & Gründer'
            ],
            [
                '@type' => 'Audience',
                'audienceType' => 'ProfessionalService',
                'name' => 'Dienstleister & Agenturen'
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
