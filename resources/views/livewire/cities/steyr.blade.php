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
        $pageUrl = $siteUrl . '/webdesign-steyr';

        SEOMeta::setTitle('Webdesign Steyr – Webagentur aus Oberösterreich');
        SEOMeta::setDescription(
            'Webdesign für Steyrer Unternehmen: Websites ab 990€ von Websters – bodenständig, SEO-stark und persönlich betreut. Industrie- & Handwerks-Erfahrung.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Steyr', 'Website erstellen Steyr', 'Webagentur Steyr',
            'Homepage Steyr', 'WordPress Steyr', 'SEO Steyr',
        ]);

        OpenGraph::setTitle('Webdesign Steyr – Websites ab 990€ | Websters');
        OpenGraph::setDescription('Webagentur für Steyr: Starter 990€, Komplett 1.990€, Premium ab 2.990€. Bodenständig, verlässlich, SEO-inklusive.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Webdesign Steyr von Websters']);

        TwitterCard::setTitle('Webdesign Steyr ab 990€ | Websters');
        TwitterCard::setDescription('Websites ab 990€ für Steyrer Betriebe – bodenständig und SEO-stark.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        JsonLd::setType('Service');
        JsonLd::setTitle('Webdesign Steyr');
        JsonLd::setDescription('Professionelles Webdesign für Unternehmen in Steyr und Umgebung.');
        JsonLd::setUrl($pageUrl);
        JsonLd::addValue('provider', ['@type' => 'Organization', '@id' => 'https://websters.at/#organization']);
        JsonLd::addValue('areaServed', ['@type' => 'City', 'name' => 'Steyr']);
        JsonLd::addValue('offers', [
            '@type' => 'Offer', 'name' => 'Website Starter Steyr', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign Steyr'],
        ]);
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Webdesign Steyr</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Webdesign für Steyr: bodenständig, stark, ehrlich
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Steyr steht für Industrie, Handwerk und Qualität – genau so bauen wir Websites: solide, schnell und ohne Schnickschnack. Ab 990€ für Steyrer Betriebe, vom EPU bis zum Industriezulieferer. Persönliche Betreuung inklusive.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Projekt in Steyr anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Alle Pakete</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Für Steyrer Betriebe gemacht</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Industrie & Zulieferer', 'Mehrsprachigkeit, Stellenportale, Dokumenten-Downloads: B2B-Websites mit Substanz für Steyrs starke Industrie – inklusive BMW-Umfeld und Handwerk.'],
                    ['Handwerk & EPU', 'Anfrageformulare, Leistungsseiten, Google-Bewertungen: alles, was ein Steyrer Handwerksbetrieb braucht, um Aufträge zu gewinnen.'],
                    ['Ehrliche Festpreise', '990€, 1.990€, ab 2.990€ – mehr musst du nicht wissen. Steyrische Bodenständigkeit gilt auch für unsere Angebote.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Pakete für Steyr: Starter 990€, Komplett 1.990€, Premium ab 2.990€</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Umfang und Ablauf im Detail auf der <a href="/leistungen/webdesign" class="underline font-semibold">Webdesign-Übersicht</a>.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Starter', '990€', 'Kompakter Auftritt für EPU & Vereine in Steyr: 1–3 Seiten, Design, Kontakt, SEO-Basics.'],
                    ['Komplett', '1.990€', 'Für etablierte Betriebe: bis 8 Seiten, Texte, Stellenbereich, Google-Profil.'],
                    ['Premium', 'ab 2.990€', 'B2B-Portale, Mehrsprachigkeit & individuelle Funktionen für größere Steyrer Unternehmen.'],
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

    <section class="pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zum Webdesign in Steyr</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website in Steyr?', 'a' => 'Ab 990€ (Starter, 1–3 Seiten), 1.990€ (Komplett, bis 8 Seiten), ab 2.990€ (Premium). Festpreis vorab, ehrlich kalkuliert, keine versteckten Kosten.'],
                    ['q' => 'Arbeitet ihr mit Steyrer Betrieben zusammen?', 'a' => 'Ja, gerne – persönlich beim Kickoff in Steyr, danach effizient remote. Feste Ansprechpartner, kurze Wege, Handschlagqualität.'],
                    ['q' => 'Könnt ihr mehrsprachige Websites für Industriekunden umsetzen?', 'a' => 'Ja. Deutsch/Englisch und weitere Sprachen, sauber mit hreflang umgesetzt – ideal für Steyrer Zulieferer mit internationalen Kunden.'],
                    ['q' => 'Wie kommen Steyrer Kunden auf meine Website?', 'a' => 'Über lokales SEO: Google-Profil, Steyr-Keywords, Bewertungen und schnelle Ladezeiten. In jedem Paket enthalten.'],
                    ['q' => 'Was passiert nach dem Launch?', 'a' => '30 Tage Support gratis, danach Wartungspaket mit Updates, Backups und Sicherheitschecks – deine Seite bleibt aktuell und sicher.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Jetzt Steyrer Projekt anfragen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>
