<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public ?array $pageSchema = null;
    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = route('contact');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        | Kürzer, schärfer, perfekte Länge (40–60 Zeichen).
        */

        SEOMeta::setTitle('Kontakt – Webdesign, Software & Beratung anfragen');
        SEOMeta::setDescription(
            'Kontaktieren Sie Websters für Webdesign ab 990€, Individualsoftware ab 3.490€ & IT-Consulting. Kostenlose Erstberatung unter +43 677 63177763.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Websters Kontakt',
            'Webdesign Agentur Oberösterreich',
            'Softwareentwicklung Anfrage',
            'IT-Consulting Termin Linz',
            'Websters Adresse',
            'Webdesign Beratung kostenlos',
            'Individualsoftware Entwicklung Kontakt',
            'Prozessoptimierung Beratung',
            'Engerwitzdorf Webagentur',
            'Webentwicklung Linz Kontakt'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Kontakt | Websters');
        OpenGraph::setDescription(
            'Ihre Ansprechstelle für Webdesign, Softwareentwicklung & IT-Consulting in Engerwitzdorf. Jetzt unverbindlich Kontakt aufnehmen.'
        );
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Websters – Kontakt und Standort'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Kontakt | Websters');
        TwitterCard::setDescription('Webdesign, Softwareentwicklung & IT-Consulting aus Oberösterreich. Jetzt Termin vereinbaren.');
        TwitterCard::setImage($siteUrl . '/assets/logo-og.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (LOCAL BUSINESS SCHEMA)
        |--------------------------------------------------------------------------
        | Vollständig, sauber strukturiert, perfekt für Google Maps & Local SEO.
        */

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'LocalBusiness';
$schema['name'] = 'Websters – Kontakt & Standort';
$schema['description'] = 'Webdesign, Individualsoftware & IT-Consulting aus Engerwitzdorf.';
$schema['url'] = $pageUrl;
$this->pageSchema = $schema;

$schema = array_merge($schema, [
            'name' => 'Websters',
            'description' => 'IT-Dienstleistung, Webdesign, Softwareentwicklung & Medienproduktion und IT-Consulting in Oberösterreich.',
            'image' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'telephone' => '+43 677 63177763',
            'email' => 'office@websters.at',

            // Adresse + GEO-Koordinaten
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Engerwitzdorf',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 48.338742140853945,
                'longitude' => 14.343424971406712
            ],

            // Öffnungszeiten
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],

            // Kontaktpunkt
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

            // Preise & Regionen
            'priceRange' => '€€-€€€',
            'areaServed' => [
                ['@type' => 'State', 'name' => 'Oberösterreich'],
                ['@type' => 'Country', 'name' => 'Österreich'],
                ['@type' => 'Country', 'name' => 'Deutschland']
            ],

            // Social Media
            'sameAs' => [
                'https://www.instagram.com/websters.at/',
                'https://github.com/websters-at'
            ],

            // Angebote
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
<div>
    <livewire:contact.components.cal/>
    <livewire:contact.components.contact-data/>
    <section class="pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark font-poppins">Fragen zur Kontaktaufnahme</h2>
            @php
                $faqs = [
                    ['q' => 'Wie schnell meldet ihr euch?', 'a' => 'Meist innerhalb von 24 Stunden an Werktagen – oft schneller. Bei eiligen Projekten einfach anrufen: +43 677 63177763.'],
                    ['q' => 'Wo findet ein Erstgespräch statt?', 'a' => 'Per Video, telefonisch oder persönlich in Engerwitzdorf bei Linz – und für größere Projekte auch bei dir vor Ort in ganz Österreich und Deutschland.'],
                    ['q' => 'Muss ich schon genau wissen, was ich will?', 'a' => 'Nein. Beschreib einfach dein Ziel – wir übersetzen es in ein konkretes Angebot mit Festpreis. Das Erstgespräch ist kostenlos und unverbindlich.'],
                    ['q' => 'Kann ich auch direkt einen Termin buchen?', 'a' => 'Ja, oben auf dieser Seite über die Online-Terminbuchung – oder direkt auf cal.com. Alternativ per Mail an office@websters.at.'],
                ];
                $faqSchema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $faqs)];
            @endphp
            <div class="mt-6 space-y-3 font-poppins">
                @foreach($faqs as $faq)
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-4">
                        <div class="font-semibold text-brand-dark">{{ $faq['q'] }}</div>
                        <p class="mt-2 text-sm text-neutral-600 lg:text-base">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
            <script type="application/ld+json">@json($faqSchema)</script>
        </div>
    </section>
    <livewire:home.components.newsletter/>



</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
