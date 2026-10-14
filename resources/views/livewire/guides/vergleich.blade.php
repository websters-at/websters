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
        $pageUrl = $siteUrl . '/ratgeber/webdesign-angebot-vergleich';

        SEOMeta::setTitle('Webdesign-Angebot vergleichen: 7-Punkte-Check');
        SEOMeta::setDescription(
            'Webdesign-Angebote richtig vergleichen: 7 Prüfpunkte zu Leistung, Preis, SEO, Eigentum & Support – inkl. Warnsignalen unseriöser Anbieter.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Angebot vergleichen', 'Webdesign Checkliste', 'Agentur vergleichen',
            'Homepage Angebot prüfen',
        ]);

        OpenGraph::setTitle('Webdesign-Angebot vergleichen: 7-Punkte-Check | Websters');
        OpenGraph::setDescription('7 Prüfpunkte + Warnsignale: So erkennst du das beste Webdesign-Angebot.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('article');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Webdesign-Angebot vergleichen']);

        TwitterCard::setTitle('Angebot-Checkliste | Websters');
        TwitterCard::setDescription('7 Punkte für das beste Webdesign-Angebot.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'Article';
$schema['name'] = 'Webdesign-Angebot vergleichen: 7-Punkte-Check';
$schema['description'] = 'Checkliste zum Vergleich von Webdesign-Angeboten.';
$schema['url'] = $pageUrl;
$schema['author'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
$schema['inLanguage'] = 'de-AT';
$this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Ratgeber</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Webdesign-Angebot vergleichen: der 7-Punkte-Check
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Drei Angebote, drei Preise, null Durchblick? Mit diesen 7 Prüfpunkten erkennst du das beste Angebot – und unseriöse Anbieter.
            </p>
        </div>
    </section>

    <article class="pb-8">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 grid gap-8 lg:grid-cols-[1fr_340px]">
            <div class="space-y-4">
                @foreach([
                    ['1. Leistungsumfang schwarz auf weiß', 'Steht exakt drin, wie viele Seiten, welche Funktionen, wie viele Korrekturrunden? Vage Formulierungen („moderne Website") sind ein Warnsignal. Unser Tipp: Fordere eine Leistungsliste mit Häkchen.'],
                    ['2. Festpreis statt Stundensatz-Blackbox', 'Ein Festpreis schützt dich vor ausufernden Stunden. Stundensätze sind nur mit Kostendeckel ok. Wir arbeiten grundsätzlich mit Festpreis.'],
                    ['3. SEO inklusive?', 'Ohne SEO-Basics (Title, Descriptions, Ladezeit, Mobiloptimierung) ist die schönste Website unsichtbar. Prüfe, ob SEO im Angebot steht oder extra kostet.'],
                    ['4. Wem gehört was? (Eigentum & Rechte)', 'Domain, Inhalte, Design-Rechte und Quellcode müssen dir gehören. Vorsicht bei „Miete": Manche Anbieter vermieten die Website monatlich – bei Kündigung ist alles weg.'],
                    ['5. DSGVO: Impressum, Datenschutz, Cookies', 'Österreich-Pflicht: Impressum nach ECG, Datenschutzerklärung, Cookie-Banner mit Opt-in, Auftragsverarbeiter-Vertrag beim Hoster. Fehlt das, wird es teuer.'],
                    ['6. Support nach dem Launch', 'Wie lange kostenloser Support? Was kostet Wartung (Updates, Backups)? Mindestens 30 Tage Support und ein klares Wartungsangebot sollten drin sein.'],
                    ['7. Referenzen & Ansprechpartner', 'Echte Projekte zum Anklicken plus fester Ansprechpartner statt Ticket-Hotline. Ruf eine Referenz an – 5 Minuten, die sich lohnen.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                        <div class="font-bold text-brand-dark text-lg">{{ $t }}</div>
                        <p class="mt-2 text-sm lg:text-base text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
                <div class="rounded-2xl border border-red-200 bg-red-50/60 p-5">
                    <div class="font-bold text-red-800 text-lg">Warnsignale unseriöser Anbieter</div>
                    <ul class="mt-2 space-y-1 text-sm text-neutral-700">
                        <li>✗ „Unschlagbar günstig" weit unter 500€ für Komplett-Websites</li>
                        <li>✗ Kein Impressum auf der eigenen Website des Anbieters</li>
                        <li>✗ Vorauszahlung 100% vor Projektstart</li>
                        <li>✗ Keine Referenzen oder nur Stockfotos als „Portfolio"</li>
                        <li>✗ Domain läuft auf den Anbieter statt auf dich</li>
                    </ul>
                </div>
            </div>
            <aside class="h-fit rounded-2xl bg-brand-dark text-white p-6 lg:sticky lg:top-6">
                <div class="font-bold text-lg">Unser Angebot zum Vergleich</div>
                <p class="mt-2 text-sm opacity-80">Leg uns daneben: Festpreis, alles schriftlich, Referenzen zum Anklicken.</p>
                <a href="/tools/preis-rechner" class="btn btn-primary btn-sm mt-4 text-white">Preis selbst kalkulieren</a>
                <a href="/kontakt" class="btn btn-ghost btn-sm mt-2 text-white">Angebot einholen</a>
            </aside>
        </div>
    </article>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zum Angebotsvergleich</h2>
            @php
                $faqs = [
                    ['q' => 'Wie viele Angebote sollte ich einholen?', 'a' => 'Drei sind ideal: ein günstiges, ein mittleres, ein Premium. Mehr verwirrt nur. Vergleiche sie mit den 7 Punkten oben statt nur nach Preis.'],
                    ['q' => 'Was ist ein fairer Preis für eine Firmenwebsite?', 'a' => 'In Österreich: unter 990€ (OnePager), 990€ (Starter, 1–3 Seiten), 1.990€ (Komplett, bis 8 Seiten), ab 2.990€ (Premium). Details: unsere Kosten-Übersicht.'],
                    ['q' => 'Woran erkenne ich Baukasten-Abzocke?', 'a' => 'Wenn für „individuelles Design" ein Standard-Template mit ausgetauschtem Logo geliefert wird. Frage nach: eigenem Design-Entwurf vorab, Admin-Zugang und ob du die Seite mitnehmen kannst.'],
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
            <p class="mt-6 text-sm text-slate-500">Auch lesen: <a href="/ratgeber/website-kosten-oesterreich" class="underline font-semibold">Was kostet eine Website in Österreich?</a></p>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
