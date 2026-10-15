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
        $pageUrl = $siteUrl . '/webdesign-innsbruck';

        SEOMeta::setTitle('Webdesign Innsbruck – Webagentur aus Österreich');
        SEOMeta::setDescription(
            'Webdesign für Innsbrucker Betriebe: Websites ab 990€ von Websters aus Oberösterreich – remote-first, regelmäßig vor Ort in Innsbruck, SEO inklusive.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Innsbruck', 'Website erstellen Innsbruck', 'Webagentur Innsbruck',
            'Homepage Innsbruck', 'WordPress Innsbruck', 'SEO Innsbruck',
        ]);

        OpenGraph::setTitle('Webdesign Innsbruck – Websites ab 990€ | Websters');
        OpenGraph::setDescription('Webagentur für Innsbruck: Starter 990€, Komplett 1.990€, Premium ab 2.990€. Remote-first, regelmäßig in Innsbruck vor Ort.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Webdesign Innsbruck von Websters']);

        TwitterCard::setTitle('Webdesign Innsbruck ab 990€ | Websters');
        TwitterCard::setDescription('Websites ab 990€ für Innsbrucker Betriebe – remote-first aus Oberösterreich.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'Service';
        $schema['name'] = 'Webdesign Innsbruck';
        $schema['description'] = 'Professionelles Webdesign für Betriebe in Innsbruck und Tirol.';
        $schema['url'] = $pageUrl;
        $schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
        $schema['areaServed'] = ['@type' => 'City', 'name' => 'Innsbruck'];
        $schema['offers'] = [
            '@type' => 'Offer', 'name' => 'Website Starter Innsbruck', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign Innsbruck'],
        ];
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Webdesign Innsbruck</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Webdesign für Innsbruck: Bergluft statt heiße Luft – zum Fixpreis
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Du suchst eine Webagentur in Innsbruck? Wir arbeiten remote-first aus Oberösterreich und sind regelmäßig für Termine in Innsbruck – von der Altstadt bis zur Uni. Websites ab 990€, SEO und Betreuung inklusive, für Tourismus, Handel, Handwerk und Dienstleister in ganz Tirol.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Projekt in Innsbruck anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Alle Pakete</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Warum Innsbruck mit Oberösterreich baut</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Fixpreis statt Tiroler Preisniveau-Schock', 'Innsbrucker Agenturen sind stolz bepreist. Bei uns: Starter 990€, Komplett 1.990€, Premium ab 2.990€ – schriftlich, vorher, fix.'],
                    ['Tourismus & Region im Blut', 'Buchung, Mehrsprachigkeit, Saison-Content: Websites, die Gäste aus dem In- und Ausland in Anfragen verwandeln – für Hotels, Gastro und Freizeit in und um Innsbruck.'],
                    ['Remote-first, trotzdem nah', 'Video-Calls, geteilte Entwürfe, schnelle Abstimmung – plus regelmäßige Innsbruck-Tage für Kickoffs und wichtige Termine vor Ort.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Pakete für Innsbruck: Starter 990€, Komplett 1.990€, Premium ab 2.990€</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Alle Details auf der <a href="/leistungen/webdesign" class="underline font-semibold">Webdesign-Übersicht</a>.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Starter', '990€', 'Für Gründer & EPU in Innsbruck: 1–3 Seiten, Design, Kontakt, SEO-Basics.'],
                    ['Komplett', '1.990€', 'Für KMU: bis 8 Seiten, Texte, Google-Profil, Bewertungen.'],
                    ['Premium', 'ab 2.990€', 'Buchungssysteme & mehrsprachige Seiten für Innsbrucker Betriebe mit Ambition.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zum Webdesign in Innsbruck</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website in Innsbruck?', 'a' => 'Ab 990€ (Starter, 1–3 Seiten), 1.990€ (Komplett, bis 8 Seiten), ab 2.990€ (Premium). Festpreis-Angebot vorab, keine versteckten Kosten.'],
                    ['q' => 'Betreut ihr Innsbrucker Kunden auch vor Ort?', 'a' => 'Ja. Für Kickoff und wichtige Meilensteine kommen wir nach Innsbruck, die laufende Abstimmung erfolgt remote – schnell und unkompliziert.'],
                    ['q' => 'Wie läuft die Zusammenarbeit auf Distanz ab?', 'a' => 'Kickoff per Video (oder in Innsbruck), Entwurf in Tagen, Feedback-Runden online, Launch-Begleitung remote. Fester Ansprechpartner, voller Einblick in jeden Fortschritt.'],
                    ['q' => 'Rankt meine Website auch in Innsbruck bei Google?', 'a' => 'Ja: lokales SEO mit Google-Profil, Innsbruck-Keywords und Technik ist in jedem Paket enthalten – damit dich Gäste und Kunden aus Stadt und Land finden.'],
                    ['q' => 'Was passiert nach dem Go-Live?', 'a' => '30 Tage Support gratis, danach Wartungspaket mit Updates, Backups und Sicherheitschecks.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Jetzt Innsbrucker Projekt anfragen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
