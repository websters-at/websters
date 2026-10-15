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
        $pageUrl = $siteUrl . '/branchen/arzt-praxis-website';

        SEOMeta::setTitle('Website für Ärzte & Praxen ab 990€');
        SEOMeta::setDescription(
            'Webdesign für Ärzte & Praxen: Terminbuchung, Leistungen, Barrierefreiheit – Websites ab 990€ aus Oberösterreich für Praxen in AT & DE.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Website Arzt', 'Praxis Website erstellen', 'Webdesign Arztpraxis',
            'Arzt Homepage', 'Praxis SEO',
        ]);

        OpenGraph::setTitle('Website für Ärzte & Praxen | Websters');
        OpenGraph::setDescription('Patientenfreundliche Praxis-Websites ab 990€ – mit Online-Terminbuchung.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Website für Ärzte von Websters']);

        TwitterCard::setTitle('Praxis-Website ab 990€ | Websters');
        TwitterCard::setDescription('Webdesign für Praxen – mit Terminbuchung & SEO.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'Service';
        $schema['name'] = 'Webdesign für Ärzte und Praxen';
        $schema['description'] = 'Patientenfreundliche Praxis-Websites: Terminbuchung, Leistungen, Barrierefreiheit.';
        $schema['url'] = $pageUrl;
        $schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
        $schema['areaServed'] = [['@type' => 'Country', 'name' => 'Österreich'], ['@type' => 'Country', 'name' => 'Deutschland']];
        $schema['offers'] = ['@type' => 'Offer', 'name' => 'Praxis-Website', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign für Praxen']];
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
                Website für Ärzte & Praxen: volle Terminkalender statt Telefon-Warteschleife
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Patienten googeln „Arzt + Stadt + Fachrichtung" – und buchen dort, wo es am einfachsten geht. Wir bauen Praxis-Websites ab 990€ mit Online-Terminbuchung, Leistungsübersicht und Barrierefreiheit.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Praxis-Projekt anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Pakete ansehen</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Was eine gute Praxis-Website kann</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Online-Terminbuchung', 'Patienten buchen rund um die Uhr – auch abends und am Wochenende. Weniger Telefon, weniger No-Shows durch Erinnerungen.'],
                    ['Gefunden in deiner Stadt', '„Hautarzt Linz", „Zahnarzt Wels": Local SEO mit Google-Profil bringt genau die Patienten, die jetzt suchen.'],
                    ['Leistungen verständlich erklärt', 'Behandlungen, Abläufe, Kosten-Infos: verständliche Seiten bauen Vertrauen und reduzieren Nachfragen in der Ordination.'],
                    ['Barrierefrei & compliant', 'Hohe Kontraste, Tastatur-Bedienung, Alt-Texte: wichtig für alle – und für ältere Patienten ein Muss. DSGVO-sauber inklusive.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zur Praxis-Website</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website für eine Praxis?', 'a' => 'Ab 990€ (Starter: Leistungen, Team, Kontakt), 1.990€ (Komplett mit Online-Buchung, Blog, erweiterter SEO). Festpreis vorab, keine Überraschungen.'],
                    ['q' => 'Braucht eine Praxis wirklich SEO?', 'a' => 'Unbedingt: Fast alle Patienten suchen online, meist mit Stadt und Fach. Wer bei „Facharzt + Stadt" nicht auftaucht, verschenkt Neupatienten an die Konkurrenz.'],
                    ['q' => 'Dürfen Patienten online Termine buchen?', 'a' => 'Ja – mit datenschutzkonformer Buchung (2-Klick-Lösung, Server in der EU). Weniger Telefon-Aufwand und weniger No-Shows durch automatische Erinnerungen.'],
                    ['q' => 'Wie schnell ist die Praxis-Website online?', 'a' => 'Starter in 2–3 Wochen, Komplett in 4–6 Wochen. Inhalte liefern wir auf Wunsch als Entwurf mit.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Praxis-Projekt besprechen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
