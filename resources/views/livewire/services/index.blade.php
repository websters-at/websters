<?php
use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public function mount(): void {
        $siteUrl = 'https://websters.at';
        $pageUrl = route('services');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Leistungen – Webdesign, Softwareentwicklung & IT-Consulting');
        SEOMeta::setDescription(
            'Unsere Dienstleistungen: Webdesign ab 990€, Custom Software ab 3.490€, IT-Consulting, Prozessoptimierung, UI/UX Design & moderne Webentwicklung aus Linz.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'Webdesign Linz',
            'Softwareentwicklung Linz',
            'IT-Consulting Linz',
            'Webagentur Leistungen',
            'Individualsoftware Österreich',
            'UI/UX Design',
            'DevOps Agentur Linz'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Leistungen – Webdesign, Software & Consulting | Webagentur Websters Linz');
        OpenGraph::setDescription('Überblick aller Services: Webdesign, Softwareentwicklung, IT-Consulting, UI/UX Design & moderne Webentwicklung.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width'  => 1200,
            'height' => 630,
            'alt'    => 'Dienstleistungen der Webagentur Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Unsere Leistungen | Webagentur Websters Linz');
        TwitterCard::setDescription('Webdesign, Softwareentwicklung, IT-Consulting und mehr aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD: SERVICE OVERVIEW AS ITEMLIST
        |--------------------------------------------------------------------------
        */

        JsonLd::setType('ItemList');
        JsonLd::setTitle('Dienstleistungen der Webagentur Websters');
        JsonLd::setDescription('Alle Services im Überblick: Webdesign, Softwareentwicklung, IT-Consulting, DevOps, UI/UX und moderne Webentwicklung.');
        JsonLd::setUrl($pageUrl);

        JsonLd::addValue('itemListElement', [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'Webdevelopement & WordPress Entwicklung',
                    'description' => 'Webdesign ab 990€. Responsive Websites, WordPress, Shops & Landing Pages.',
                    'url' => route('webdesign')
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'Custom Software Entwicklung',
                    'description' => 'Individuelle Softwarelösungen ab 3.490€ für Unternehmen & Startups.',
                    'url' => route('software')
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'IT-Consulting & Prozessoptimierung',
                    'description' => 'Digitale Transformation, Prozessanalyse & Optimierung.',
                    'url' => route('consulting')
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 4,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'DevOps & Cloud Architektur',
                    'description' => 'Skalierbare Systeme, CI/CD Pipelines & Cloud-Infrastruktur.',
                    'url' => route('cloud')
                ],
            ],
            [
                '@type' => 'ListItem',
                'position' => 5,
                'item' => [
                    '@type' => 'Service',
                    'name' => 'Design',
                    'description' => 'Fyler, Visitenkarten, Moodboard & alles was das Herz begehrt.',
                    'url' => route('design')
                ],
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | ORGANIZATION INFO (LOCAL SEO BOOST)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Webagentur Websters',
            'description' => 'Full-Service Webagentur aus Linz für Webdesign, Softwareentwicklung und IT-Consulting.',
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
