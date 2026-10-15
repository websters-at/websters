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
        $pageUrl = $siteUrl . '/webdesign-linz';

        SEOMeta::setTitle('Webdesign Linz – Websites ab 990€');
        SEOMeta::setDescription(
            'Webdesign in Linz gesucht? Websters aus Engerwitzdorf (15 Min. entfernt): Websites ab 990€, SEO-optimiert & persönlich vor Ort in Linz.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Linz', 'Website erstellen Linz', 'Webagentur Linz',
            'Homepage erstellen Linz', 'WordPress Linz', 'SEO Linz',
        ]);

        OpenGraph::setTitle('Webdesign Linz – Websites ab 990€ | Websters');
        OpenGraph::setDescription('Deine Webagentur bei Linz: Starter 990€, Komplett 1.990€, Premium ab 2.990€. Persönlich vor Ort, SEO inklusive.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Webdesign Linz von Websters']);

        TwitterCard::setTitle('Webdesign Linz ab 990€ | Websters');
        TwitterCard::setDescription('Websites ab 990€ aus der Region Linz – persönlich, schnell, SEO-optimiert.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'Service';
$schema['name'] = 'Webdesign Linz';
$schema['description'] = 'Professionelles Webdesign für Unternehmen in Linz und Umgebung.';
$schema['url'] = $pageUrl;
$schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
$schema['areaServed'] = ['@type' => 'City', 'name' => 'Linz'];
$schema['offers'] = [
            '@type' => 'Offer', 'name' => 'Website Starter Linz', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign Linz'],
        ];
$this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Webdesign Linz</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Webdesign in Linz: Websites, die Kunden bringen
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Du suchst eine Webagentur in Linz? Wir sitzen in Engerwitzdorf – 15 Minuten von der Linzer Innenstadt – und betreuen Unternehmen aus Linz und Umgebung persönlich vor Ort: von der Tabakfabrik bis nach Urfahr. Websites ab 990€, SEO inklusive.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Projekt in Linz anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Alle Pakete</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Warum Linzer Unternehmen mit uns arbeiten</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Persönlich vor Ort', 'Kickoff bei dir im Büro in Linz, kurze Wege, direkter Draht zu den Entwicklern – keine anonyme Remote-Agentur.'],
                    ['Linzer Digital-Standort Know-how', 'Ob Startup aus der Tabakfabrik, Gastro an der Landstraße oder Handwerk aus Ebelsberg: Wir kennen den Linzer Markt und seine Kunden.'],
                    ['SEO für Linz-Suchen', 'Deine Website rankt für „Branche + Linz": Google-Unternehmensprofil, lokale Keywords und technische SEO sind bei jedem Paket dabei.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark md:text-lg">{{ $t }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Pakete für Linz: Starter 990€, Komplett 1.990€, Premium ab 2.990€</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Gleiche transparente Preise wie überall in Oberösterreich – Details zu allen Paketen findest du auf der <a href="/leistungen/webdesign" class="underline font-semibold">Webdesign-Übersicht</a>.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Starter', '990€', 'Ideal für Gründer & EPU in Linz: 1–3 Seiten, responsives Design, Kontaktformular, SEO-Basics.'],
                    ['Komplett', '1.990€', 'Für KMU: bis 8 Seiten, Copywriting-Unterstützung, erweiterte SEO, Google-Profil-Einrichtung.'],
                    ['Premium', 'ab 2.990€', 'Web-Apps, Shops & individuelle Funktionen für Linzer Unternehmen mit größeren Plänen.'],
                ] as [$t, $p, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark text-lg">{{ $t }}</div>
                        <div class="mt-1 text-2xl font-bold text-brand-dark">{{ $p }}</div>
                        <p class="mt-2 text-sm text-slate-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pt-12 lg:pt-16 pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zum Webdesign in Linz</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website in Linz?', 'a' => 'Bei Websters starten Websites bei 990€ (Starter, 1–3 Seiten), das Komplett-Paket mit bis zu 8 Seiten kostet 1.990€, Premium-Lösungen ab 2.990€. Du erhältst vorab ein Festpreis-Angebot – transparent, ohne versteckte Kosten.'],
                    ['q' => 'Kommt ihr für das Projekt nach Linz?', 'a' => 'Ja. Von Engerwitzdorf sind wir in ca. 15 Minuten in der Linzer Innenstadt. Kickoff und wichtige Termine machen wir gerne persönlich bei dir vor Ort, der Rest läuft effizient remote.'],
                    ['q' => 'Wie schnell ist meine Linzer Website online?', 'a' => 'Der Starter ist meist in 2–3 Wochen fertig, Komplett-Websites in 4–6 Wochen. Komplexe Projekte mit 6–8 Wochen einplanen.'],
                    ['q' => 'Optimiert ihr auch für Google-Suchen in Linz?', 'a' => 'Ja, lokales SEO ist Standard: Google-Unternehmensprofil, Linz-Keywords, technische SEO und schnelle Ladezeiten – damit dich Kunden aus Linz und Umgebung finden.'],
                    ['q' => 'Betreut ihr die Website nach dem Launch weiter?', 'a' => 'Ja: 30 Tage Support sind inkludiert, danach gibt es ein Wartungspaket mit Updates, Backups, Sicherheitschecks und Support.'],
                ];
                $faqSchema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $faqs)];
            @endphp
            <div class="mt-6 space-y-3">
                @foreach($faqs as $faq)
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-4 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark">{{ $faq['q'] }}</div>
                        <p class="mt-2 text-sm text-neutral-600 lg:text-base">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
            <script type="application/ld+json">@json($faqSchema)</script>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="/kontakt" class="btn btn-primary text-white">Jetzt Linzer Projekt anfragen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
