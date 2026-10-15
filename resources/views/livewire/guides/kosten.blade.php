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
        $pageUrl = $siteUrl . '/ratgeber/website-kosten-oesterreich';

        SEOMeta::setTitle('Was kostet eine Website in Österreich? (2026)');
        SEOMeta::setDescription(
            'Website-Kosten Österreich 2026: OnePager unter 990€, Starter 990€, Komplett 1.990€, Premium ab 2.990€ – inkl. Kostenfaktoren, laufende Kosten & Spartipps.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Website Kosten Österreich', 'Was kostet eine Website', 'Homepage Kosten',
            'Webdesign Preise', 'Website erstellen Kosten',
        ]);

        OpenGraph::setTitle('Was kostet eine Website in Österreich? | Websters');
        OpenGraph::setDescription('Ehrliche Preis-Tabelle 2026: von unter 990€ bis Premium – mit Kostenfaktoren und Spartipps.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('article');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Website Kosten Österreich']);

        TwitterCard::setTitle('Website Kosten Österreich 2026 | Websters');
        TwitterCard::setDescription('Preis-Tabelle + Spartipps für deine Website.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'Article';
$schema['name'] = 'Was kostet eine Website in Österreich? Preise 2026';
$schema['description'] = 'Überblick über Website-Kosten in Österreich: Pakete, Kostenfaktoren und laufende Kosten.';
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
                Was kostet eine Website in Österreich? (2026)
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Die ehrliche Antwort mit Preis-Tabelle, Kostenfaktoren und laufenden Kosten – damit du Angebote richtig einordnen kannst.
            </p>
        </div>
    </section>

    <article class="pb-8">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 grid gap-8 lg:grid-cols-[1fr_340px]">
            <div class="space-y-8">
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Kurzantwort: 490€ bis 3.000€+ für die meisten Websites</h2>
                    <p class="mt-3 text-sm lg:text-base text-slate-600">Eine simple OnePage-Website gibt es <strong>unter 990€</strong>, eine professionelle Firmenwebsite mit 1–3 Seiten kostet <strong>990€</strong>, ein Komplett-Auftritt mit bis zu 8 Seiten <strong>1.990€</strong> und individuelle Premium-Websites starten bei <strong>2.990€</strong>. Alles darüber ist Shop, Web-App oder Custom Software.</p>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Preis-Tabelle im Detail</h2>
                    <div class="mt-4 overflow-x-auto rounded-2xl border border-slate-200">
                        <table class="w-full text-sm">
                            <thead><tr class="bg-slate-50 text-left text-brand-dark"><th class="p-3">Paket</th><th class="p-3">Preis</th><th class="p-3">Für wen</th></tr></thead>
                            <tbody class="text-slate-600">
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Simple OnePager</td><td class="p-3">&lt; 990€</td><td class="p-3">Visitenkarte, Aktion, schneller Start</td></tr>
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Starter</td><td class="p-3">990€</td><td class="p-3">Gründer & EPU, 1–3 Seiten</td></tr>
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Komplett</td><td class="p-3">1.990€</td><td class="p-3">KMU, bis 8 Seiten inkl. Texte</td></tr>
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Premium</td><td class="p-3">ab 2.990€</td><td class="p-3">Shops, Buchung, individuelle Funktionen</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mt-3 text-sm text-slate-500">Unsere Preise transparent aufgeschlüsselt: <a href="/leistungen/webdesign" class="underline font-semibold">Webdesign-Pakete</a>.</p>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Was treibt den Preis?</h2>
                    <div class="mt-4 grid gap-3 sm:grid-cols-2">
                        @foreach([
                            ['Seitenzahl & Inhalte', 'Jede Seite braucht Design, Texte, Bilder. Wer Inhalte liefert, spart Copywriting (+390€).'],
                            ['Design-Anspruch', 'Schlicht (+0€), individuell (+300€), Premium-Branding (+900€) – der größte Hebel nach dem Umfang.'],
                            ['Funktionen', 'Formulare sind Standard; Shop, Buchung, Mehrsprachigkeit oder Kundenlogin kosten extra (ab ~590€).'],
                            ['SEO & Texte', 'Basis-SEO ist überall dabei. Wer ranken will, investiert in Keyword-Setup und laufende Betreuung.'],
                        ] as [$t, $d])
                            <div class="rounded-2xl border border-slate-200 bg-white/60 p-4">
                                <div class="font-semibold text-brand-dark">{{ $t }}</div>
                                <p class="mt-1 text-sm text-neutral-600">{{ $d }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Laufende Kosten einplanen</h2>
                    <p class="mt-3 text-sm lg:text-base text-slate-600">Nach dem Launch fallen an: <strong>Domain</strong> (ca. 10–20€/Jahr), <strong>Hosting</strong> (bei uns ab 9,90€/Monat) und optional ein <strong>Wartungspaket</strong> (Updates, Backups, Support). Rechne grob mit 150–500€ pro Jahr für eine normale Firmenwebsite.</p>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Spartipps</h2>
                    <ul class="mt-3 space-y-2 text-sm lg:text-base text-slate-600">
                        <li>✓ Texte und Bilder selbst liefern spart Copywriting-Budget.</li>
                        <li>✓ Mit Starter beginnen und später erweitern statt alles auf einmal.</li>
                        <li>✓ Festpreis verlangen – Stundensätze ohne Deckel werden teuer.</li>
                        <li>✓ Wartung mitbuchen statt nach einem Hack teuer zu reparieren.</li>
                    </ul>
                </section>
            </div>
            <aside class="h-fit rounded-2xl bg-brand-dark text-white p-6 lg:sticky lg:top-6">
                <div class="font-bold text-lg">Dein Preis in 1 Minute</div>
                <p class="mt-2 text-sm opacity-80">Rechner ausfüllen, Schätzung sehen, Festpreis-Angebot anfordern.</p>
                <a href="/kontakt" class="btn btn-primary btn-sm mt-4 text-white">Kostenloses Angebot einholen</a>
                <a href="/kontakt" class="btn btn-ghost btn-sm mt-2 text-white">Direkt anfragen</a>
            </aside>
        </div>
    </article>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu Website-Kosten</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine einfache Homepage in Österreich?', 'a' => 'Eine simple OnePage-Seite gibt es unter 990€, eine professionelle kleine Firmenwebsite (1–3 Seiten) kostet 990€. Inklusive Design, responsiver Umsetzung und SEO-Basics.'],
                    ['q' => 'Warum sind manche Angebote so viel günstiger?', 'a' => 'Vorsicht bei Preisen weit unter 500€ für „komplette" Websites: Meist Baukasten-Templates ohne SEO, ohne Impressum/DSGVO-Anpassung und ohne Support. Der billigste Anbieter wird langfristig oft der teuerste.'],
                    ['q' => 'Was kostet eine Website pro Jahr laufend?', 'a' => 'Domain (10–20€), Hosting (ab ca. 120€/Jahr) und optional Wartung. Für eine normale Firmenwebsite grob 150–500€ pro Jahr.'],
                    ['q' => 'Bietet ihr Ratenzahlung an?', 'a' => 'Sprich uns an – bei größeren Projekten finden wir eine Zahlungsaufteilung nach Meilensteinen, die für beide Seiten passt.'],
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
            <p class="mt-6 text-sm text-slate-500">Weiterlesen: <a href="/ratgeber/webdesign-angebot-vergleich" class="underline font-semibold">Webdesign-Angebote richtig vergleichen</a></p>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
