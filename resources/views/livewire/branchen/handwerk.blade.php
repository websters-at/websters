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
        $pageUrl = $siteUrl . '/branchen/handwerk-website';

        SEOMeta::setTitle('Website für Handwerk & Gewerbe ab 990€');
        SEOMeta::setDescription(
            'Webdesign fürs Handwerk: Vorher-Nachher, Angebots-Anfrage & Local SEO – Websites ab 990€ aus Oberösterreich für Betriebe in AT & DE.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Website Handwerker', 'Handwerk Website erstellen', 'Webdesign Handwerk',
            'Handwerker Homepage', 'Handwerk SEO',
        ]);

        OpenGraph::setTitle('Website für Handwerk & Gewerbe | Websters');
        OpenGraph::setDescription('Handwerker-Websites ab 990€, die Aufträge bringen – mit Galerie & Anfrage.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Website fürs Handwerk von Websters']);

        TwitterCard::setTitle('Handwerker-Website ab 990€ | Websters');
        TwitterCard::setDescription('Webdesign fürs Handwerk – die Aufträge bringt.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'Service';
        $schema['name'] = 'Webdesign für Handwerk und Gewerbe';
        $schema['description'] = 'Handwerker-Websites mit Wirkung: Referenzen, Anfrage, Local SEO.';
        $schema['url'] = $pageUrl;
        $schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
        $schema['areaServed'] = [['@type' => 'Country', 'name' => 'Österreich'], ['@type' => 'Country', 'name' => 'Deutschland']];
        $schema['offers'] = ['@type' => 'Offer', 'name' => 'Handwerker-Website', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign fürs Handwerk']];
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
                Website fürs Handwerk: Aufträge statt Kaltakquise
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Kunden googeln „Handwerker + Stadt" – und entscheiden nach Bildern, Bewertungen und Entfernung. Wir bauen Handwerker-Websites ab 990€ mit Vorher-Nachher-Galerie, Angebots-Anfrage und Local SEO, die Aufträge bringen.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Handwerk-Projekt anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Pakete ansehen</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Was eine gute Handwerker-Website kann</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Vorher-Nachher, die verkauft', 'Echte Projektfotos statt Stock: Sanierung, Neubau, Details – deine beste Werbung – automatisch, rund um die Uhr.'],
                    ['Anfrage in 2 Minuten', 'Angebots-Formular mit Foto-Upload: Anfragen mit allen Infos landen direkt bei dir – keine Portale, keine Provision.'],
                    ['Bewertungen & Vertrauen', 'Google-Bewertungen, Meisterbetrieb-Siegel, Partner-Logos – machen aus Besuchern Anrufer.'],
                    ['Local SEO Stadt + Umland', '„Installateur Linz", „Tischler Wels": gefunden werden, wo Kunden suchen – Google-Profil inklusive.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zur Handwerker-Website</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website für einen Handwerksbetrieb?', 'a' => 'Ab 990€ (Starter: Leistungen, Galerie, Kontakt), 1.990€ (Komplett mit Angebots-Anfrage, Blog, erweiterter SEO). Festpreis vorab.'],
                    ['q' => 'Braucht ein Handwerksbetrieb wirklich SEO?', 'a' => 'Unbedingt: Fast alle Kunden suchen online, meist mit Ort + Gewerk. Wer bei „Gewerk + Stadt" nicht auftaucht, verschenkt jeden Auftrag an die Konkurrenz mit Website.'],
                    ['q' => 'Wie kommen Anfragen bei mir an?', 'a' => 'Per Angebots-Formular mit Foto-Upload, per Anruf-Button und per Mail – alles landet direkt bei dir, keine Portale, keine Provision.'],
                    ['q' => 'Wie schnell ist die Handwerker-Website online?', 'a' => 'Starter in 2–3 Wochen, Komplett in 4–6 Wochen. Fotos vom Handy genügen – Rest übernehmen wir.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Handwerk-Projekt besprechen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
