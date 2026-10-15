<?php
use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public ?array $pageSchema = null;
    public function mount(): void {
        $siteUrl = 'https://websters.at';
        $pageUrl = route('services');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Leistungen – Webdesign, Software & Consulting');
        SEOMeta::setDescription(
            'Webdesign ab 990€, Custom Software ab 3.490€ & IT-Consulting aus Oberösterreich für Unternehmen in Österreich & Deutschland.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'Webdesign Linz',
            'Softwareentwicklung Linz',
            'IT-Consulting Linz',
            'Websters Leistungen',
            'Individualsoftware Österreich',
            'UI/UX Design',
            'DevOps Agentur Linz'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Leistungen – Webdesign, Software & Consulting | Websters');
        OpenGraph::setDescription('Überblick aller Services: Webdesign, Softwareentwicklung, IT-Consulting, UI/UX Design & moderne Webentwicklung.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width'  => 1200,
            'height' => 630,
            'alt'    => 'Dienstleistungen der Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Unsere Leistungen | Websters');
        TwitterCard::setDescription('Webdesign, Softwareentwicklung, IT-Consulting und mehr aus Oberösterreich für Österreich & Deutschland.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD: SERVICE OVERVIEW AS ITEMLIST
        |--------------------------------------------------------------------------
        */

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'ItemList';
$schema['name'] = 'Dienstleistungen der Websters';
$schema['description'] = 'Alle Services im Überblick: Webdesign, Softwareentwicklung, IT-Consulting, DevOps, UI/UX und moderne Webentwicklung.';
$schema['url'] = $pageUrl;

$schema['itemListElement'] = [
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
        ];

        /*
        |--------------------------------------------------------------------------
        | ORGANIZATION INFO (LOCAL SEO BOOST)
        |--------------------------------------------------------------------------
        */

$schema['mainEntity'] = [
            '@type' => 'Organization',
            'name' => 'Websters',
            'description' => 'Full-Service Webagentur aus Linz für Webdesign, Softwareentwicklung und IT-Consulting.',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Engerwitzdorf',
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
        ];
$this->pageSchema = $schema;
    }
};
?>



<div class="font-poppins">
    <livewire:services.components.hero />

    <!-- PAKET-ÜBERSICHT: von simpel bis Premium -->
    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Alle Pakete im Überblick – von simpel bis Premium</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl">Ob ganz simple Visitenkarte oder komplexe Business-Software: Du siehst sofort, was was kostet. Jedes Paket als Festpreis, ohne Überraschungen.</p>

            <h3 class="mt-10 text-xl lg:text-2xl font-bold text-brand-dark">Webdesign & Websites</h3>
            <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Simple OnePager', '< 990€', 'Die ganz simple Lösung: eine starke Seite für Visitenkarte, Aktion oder „bald online". In Tagen live.'],
                    ['Starter', '990€', '1–3 Seiten, responsives Design, Kontaktformular, SEO-Basics. Für Gründer & EPU.'],
                    ['Komplett', '1.990€', 'Bis 8 Seiten, Texte, Bilder, Google-Profil, erweiterte SEO. Für KMU.'],
                    ['Premium', 'ab 2.990€', 'Shops, Buchung, Web-Apps & individuelle Funktionen. Nach oben offen.'],
                ] as [$t, $p, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                        <div class="font-semibold text-brand-dark">{{ $t }}</div>
                        <div class="mt-1 text-xl font-bold text-brand-dark">{{ $p }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
            <a href="/leistungen/webdesign" class="btn btn-sm btn-primary mt-4 text-white">Details & Ablauf Webdesign</a>

            <h3 class="mt-10 text-xl lg:text-2xl font-bold text-brand-dark">Individualsoftware</h3>
            <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Mini-Tool', '< 990€', 'Ganz simpel: ein Python-Skript, ein Automatisierungs-Job, eine kleine Anbindung. Fixpreis, schnell geliefert.'],
                    ['Basis Software', 'ab 3.490€', 'Web-App mit definiertem Umfang: deine erste maßgeschneiderte Lösung.'],
                    ['Business', 'auf Anfrage', 'Software mit Integrationen, Rollen, Workflows & Reporting.'],
                    ['Enterprise', 'auf Anfrage', 'Komplexe Systeme, Cloud, SLAs, Schulung & laufende Betreuung.'],
                ] as [$t, $p, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                        <div class="font-semibold text-brand-dark">{{ $t }}</div>
                        <div class="mt-1 text-xl font-bold text-brand-dark">{{ $p }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
            <a href="/leistungen/software" class="btn btn-sm btn-primary mt-4 text-white">Details Software-Entwicklung</a>

            <h3 class="mt-10 text-xl lg:text-2xl font-bold text-brand-dark">IT-Consulting</h3>
            <div class="mt-4 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Website-Check', '149€', 'Ganz simpel einsteigen: Technik-, SEO- & Speed-Audit deiner aktuellen Website mit konkreter To-do-Liste.'],
                    ['Beratung & Konzept', 'Festpreis', 'Prozessanalyse, Digitalisierungs-Roadmap, Software-Auswahl – kalkuliert nach kostenlosem Scoping.'],
                    ['Umsetzung & Begleitung', 'auf Anfrage', 'Wir setzen selbst um oder begleiten dein Team – inkl. Erfolgsmessung.'],
                ] as [$t, $p, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                        <div class="font-semibold text-brand-dark">{{ $t }}</div>
                        <div class="mt-1 text-xl font-bold text-brand-dark">{{ $p }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
            <a href="/leistungen/consulting" class="btn btn-sm btn-primary mt-4 text-white">Details IT-Consulting</a>
        </div>
    </section>

    <!-- HOSTING PUR -->
    <section class="py-12 lg:py-16 bg-slate-50" id="hosting">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white">Hosting</div>
            <h2 class="mt-4 text-2xl lg:text-4xl font-bold text-brand-dark">Webhosting pur – ab 9,90€ pro Monat</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl">Du brauchst nur Hosting, keine neue Website? Gerne: Wir hosten deine Website oder App auf unserer Infrastruktur in Österreich – mit Domain, SSL, E-Mail, Backups und Ansprechpartner statt Hotline. Auch für Websites, die wir nicht gebaut haben.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Hosting S', '9,90€/Monat', 'Für einfache Websites: 10 GB Speicher, SSL, 5 E-Mail-Adressen, wöchentliches Backup.'],
                    ['Hosting M', '19,90€/Monat', 'Für Business-Websites: 50 GB, SSL, unlimitierte E-Mails, tägliches Backup, Monitoring.'],
                    ['Hosting L', '39,90€/Monat', 'Für Shops & Apps: 200 GB, Staging-Umgebung, stündliche Backups, Performance-Tuning.'],
                    ['Domain & Mail', 'ab 19€/Jahr', 'Domain registrieren (.at, .com, .de …), E-Mail einrichten, alles verwaltet – auch solo buchbar.'],
                ] as [$t, $p, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white p-5">
                        <div class="font-semibold text-brand-dark">{{ $t }}</div>
                        <div class="mt-1 text-xl font-bold text-brand-dark">{{ $p }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 flex flex-wrap gap-2">
                <a href="/kontakt" class="btn btn-sm btn-primary text-white">Hosting anfragen</a>
                <a href="/tools/domain-check" class="btn btn-sm btn-neutral text-white">Domain Verfügbarkeit prüfen</a>
            </div>
        </div>
    </section>

    <livewire:services.components.process />

    <!-- REGIONEN -->
    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Webdesign in deiner Nähe</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl">Persönlich vor Ort in Oberösterreich – remote in ganz Österreich und Deutschland.</p>
            <div class="mt-6 flex flex-wrap gap-2">
                <a href="/webdesign-linz" class="btn btn-sm btn-neutral text-white">Webdesign Linz</a>
                <a href="/webdesign-wels" class="btn btn-sm btn-neutral text-white">Webdesign Wels</a>
                <a href="/webdesign-steyr" class="btn btn-sm btn-neutral text-white">Webdesign Steyr</a>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="pt-12 lg:pt-16 pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu Leistungen & Preisen</h2>
            @php
                $faqs = [
                    ['q' => 'Was ist die günstigste Website bei Websters?', 'a' => 'Der Simple OnePager unter 990€: eine starke Seite für Visitenkarte, Aktionen oder den schnellen Start. In wenigen Tagen live, SEO-Basics inklusive.'],
                    ['q' => 'Bietet ihr auch nur Hosting ohne neue Website an?', 'a' => 'Ja. Hosting S ab 9,90€/Monat, M 19,90€, L 39,90€ – mit Domain, SSL, E-Mail und Backups. Auch für Websites, die woanders gebaut wurden, inklusive kostenlosem Umzug.'],
                    ['q' => 'Was kostet die kleinste individuelle Softwarelösung?', 'a' => 'Mini-Tools und Automatisierungen gibt es deutlich unter 990€ zum Festpreis. Größere Web-Apps (Basis-Paket) starten bei 3.490€.'],
                    ['q' => 'Gibt es auch eine kleine Beratungsleistung zum Einstieg?', 'a' => 'Ja: Der Website-Check für 149€ analysiert Technik, SEO und Speed deiner aktuellen Website und liefert eine priorisierte To-do-Liste. Das Erstgespräch ist immer kostenlos.'],
                    ['q' => 'Kann ich Domain, Hosting und Website aus einer Hand bekommen?', 'a' => 'Genau dafür gibt es uns: Domain prüfen und registrieren, Hosting einrichten, Website bauen, E-Mails einrichten – ein Ansprechpartner in Oberösterreich für alles.'],
                ];
                $faqSchema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $faqs)];
            @endphp
            <div class="mt-6 space-y-3">
                @foreach($faqs as $faq)
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-4">
                        <div class="font-semibold text-brand-dark">{{ $faq['q'] }}</div>
                        <p class="mt-2 text-sm text-neutral-600 lg:text-base">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
            <script type="application/ld+json">@json($faqSchema)</script>
            <p class="mt-6 text-sm text-slate-500">Ratgeber: <a href="/ratgeber/website-kosten-oesterreich" class="underline font-semibold">Was kostet eine Website?</a> · <a href="/ratgeber/webdesign-angebot-vergleich" class="underline font-semibold">Angebote vergleichen</a></p>
        </div>
    </section>

    <livewire:services.components.cta />
    <livewire:home.components.newsletter />
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
