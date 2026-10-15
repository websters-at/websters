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
        $pageUrl = $siteUrl . '/branchen/anwalt-kanzlei-website';

        SEOMeta::setTitle('Website für Anwälte & Kanzleien ab 990€');
        SEOMeta::setDescription(
            'Webdesign für Rechtsanwälte & Kanzleien: vertrauensvoll, diskret, SEO-stark – Websites ab 990€ aus Oberösterreich für Kanzleien in AT & DE.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Website Anwalt', 'Kanzlei Website erstellen', 'Webdesign Rechtsanwalt',
            'Anwalts Homepage', 'Kanzlei SEO',
        ]);

        OpenGraph::setTitle('Website für Anwälte & Kanzleien | Websters');
        OpenGraph::setDescription('Vertrauensvolle Kanzlei-Websites ab 990€ – diskret, SEO-stark, persönlich betreut.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Website für Anwälte von Websters']);

        TwitterCard::setTitle('Kanzlei-Website ab 990€ | Websters');
        TwitterCard::setDescription('Webdesign für Anwälte – vertrauensvoll & SEO-stark.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'Service';
        $schema['name'] = 'Webdesign für Anwälte und Kanzleien';
        $schema['description'] = 'Professionelle Kanzlei-Websites: vertrauensvoll, diskret, SEO-optimiert.';
        $schema['url'] = $pageUrl;
        $schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
        $schema['areaServed'] = [['@type' => 'Country', 'name' => 'Österreich'], ['@type' => 'Country', 'name' => 'Deutschland']];
        $schema['offers'] = ['@type' => 'Offer', 'name' => 'Kanzlei-Website', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign für Kanzleien']];
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Branchenlösung</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Website für Anwälte & Kanzleien: Mandanten gewinnen im Schlaf
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Mandanten googeln „Rechtsanwalt + Stadt" – und entscheiden in Sekunden nach Vertrauen. Wir bauen Kanzlei-Websites ab 990€, die seriös wirken, bei Google gefunden werden und Erstberatungen bringen.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Kanzlei-Projekt anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Pakete ansehen</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Was eine gute Kanzlei-Website kann</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Vertrauen ab Sekunde 1', 'Klare Kanzlei-Profile mit Foto, Schwerpunkten und Vita – Mandanten beauftragen Menschen, keine Logos.'],
                    ['Gefunden in deiner Stadt', '„Scheidung Anwalt Linz", „Strafrecht Graz": Local SEO bringt genau die Mandanten, die jetzt suchen.'],
                    ['Erstberatung als Call-to-Action', 'Online-Terminbuchung, Rückruf-Formular, klare nächste Schritte – aus Besuchern werden Anfragen.'],
                    ['Diskret & compliant', 'DSGVO-saubere Kontaktformulare, keine US-Tracker ohne Einwilligung, Impressum nach ECG – standesgerecht.'],
                ] as [$t, $d])
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-5 fade-up" :class="{ 'show': show }">
                        <div class="font-semibold text-brand-dark md:text-lg">{{ $t }}</div>
                        <p class="mt-2 text-sm text-neutral-600">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zur Kanzlei-Website</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website für eine Kanzlei?', 'a' => 'Ab 990€ (Starter: Profil, Schwerpunkte, Kontakt), 1.990€ (Komplett mit Team-Seiten, News/Blog, erweiterter SEO). Festpreis vorab, keine Überraschungen.'],
                    ['q' => 'Braucht eine Kanzlei wirklich SEO?', 'a' => 'Unbedingt: 9 von 10 Mandanten suchen online, meist mit Stadt. Wer bei „Anwalt + Stadt + Rechtsgebiet" nicht auftaucht, verschenkt die besten Fälle an die Konkurrenz.'],
                    ['q' => 'Dürfen Mandanten online Termine buchen?', 'a' => 'Ja – mit datenschutzkonformer Buchung (2-Klick-Lösung, Server in der EU). Das senkt die Hürde für Erstberatungen deutlich.'],
                    ['q' => 'Wie schnell ist die Kanzlei-Website online?', 'a' => 'Starter in 2–3 Wochen, Komplett in 4–6 Wochen. Inhalte (Profile, Texte) liefern wir auf Wunsch als Entwurf mit.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Kanzlei-Projekt besprechen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
