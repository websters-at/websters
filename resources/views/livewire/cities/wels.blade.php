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
        $pageUrl = $siteUrl . '/webdesign-wels';

        SEOMeta::setTitle('Webdesign Wels – Website erstellen lassen ab 990€');
        SEOMeta::setDescription(
            'Webdesign für Unternehmen in Wels: Websites ab 990€ von Websters aus Oberösterreich – SEO-optimiert, persönlich betreut, auch vor Ort in Wels.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Webdesign Wels', 'Website erstellen Wels', 'Webagentur Wels',
            'Homepage Wels', 'WordPress Wels', 'SEO Wels',
        ]);

        OpenGraph::setTitle('Webdesign Wels – Websites ab 990€ | Websters');
        OpenGraph::setDescription('Deine Webagentur für Wels: Starter 990€, Komplett 1.990€, Premium ab 2.990€. Messestark auftreten – online wie offline.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Webdesign Wels von Websters']);

        TwitterCard::setTitle('Webdesign Wels ab 990€ | Websters');
        TwitterCard::setDescription('Websites ab 990€ für Welser Unternehmen – persönlich betreut aus Oberösterreich.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'Service';
$schema['name'] = 'Webdesign Wels';
$schema['description'] = 'Professionelles Webdesign für Unternehmen in Wels und Umgebung.';
$schema['url'] = $pageUrl;
$schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
$schema['areaServed'] = ['@type' => 'City', 'name' => 'Wels'];
$schema['offers'] = [
            '@type' => 'Offer', 'name' => 'Website Starter Wels', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign Wels'],
        ];
$this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Webdesign Wels</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Webdesign für Wels: deine Website als Vertriebsmitarbeiter
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Wels ist Messe- und Handelsstadt – wer hier verkauft, braucht einen Webauftritt, der genauso überzeugt wie das Standpersonal. Wir bauen Websites ab 990€ für Welser Betriebe: vom Handwerk über Handel bis Dienstleistung. Betreuung persönlich, auch vor Ort in Wels.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Projekt in Wels anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Alle Pakete</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Was Welser Kunden an uns schätzen</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Handel & Gewerbe im Fokus', 'Produktseiten, Angebotsformulare, Terminbuchung: Websites, die Anfragen bringen statt nur gut auszusehen – gebaut für Welser Handels- und Gewerbebetriebe.'],
                    ['Messe-Synergie', 'Rund um Welser Messe-Termine pushen wir deinen Relaunch, damit Stand-Besucher online nahtlos weiterfinden. Print und Web aus einer Hand gedacht.'],
                    ['Erreichbar & verlässlich', 'Anfahrt aus Oberösterreich für Kickoffs in Wels, danach schnelle Abstimmung remote. Feste Ansprechpartner statt Hotline.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Pakete für Wels: Starter 990€, Komplett 1.990€, Premium ab 2.990€</h2>
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-2xl fade-up" :class="{ 'show': show }">Alle Details zu Umfang und Ablauf stehen auf der <a href="/leistungen/webdesign" class="underline font-semibold">Webdesign-Übersicht</a>.</p>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach([
                    ['Starter', '990€', 'Schlanker Auftritt für EPU & Gründer in Wels: 1–3 Seiten, Design, Kontakt, SEO-Basics.'],
                    ['Komplett', '1.990€', 'Für etablierte Betriebe: bis 8 Seiten, Texte, Bilder, Google-Profil, Bewertungs-Integration.'],
                    ['Premium', 'ab 2.990€', 'Shops, Buchungssysteme & Web-Apps für Welser Unternehmen mit Wachstumsplänen.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zum Webdesign in Wels</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Website in Wels?', 'a' => 'Ab 990€ für den Website Starter (1–3 Seiten), 1.990€ für das Komplett-Paket (bis 8 Seiten) und ab 2.990€ für Premium mit Shop oder Web-App. Festpreis-Angebot vorab, keine versteckten Kosten.'],
                    ['q' => 'Betreut ihr Kunden in Wels auch vor Ort?', 'a' => 'Ja. Für Kickoff und wichtige Meilensteine kommen wir nach Wels, die laufende Abstimmung erfolgt remote – schnell und unkompliziert.'],
                    ['q' => 'Könnt ihr einen bestehenden Welser Webauftritt überarbeiten?', 'a' => 'Ja, Relaunch ist unser Tagesgeschäft: Wir analysieren deine aktuelle Website, übernehmen Inhalte und bauen sie modern, schnell und SEO-stark neu – ohne Ranking-Verlust.'],
                    ['q' => 'Wie werden Welser Kunden auf mich aufmerksam?', 'a' => 'Durch lokales SEO: Google-Unternehmensprofil, Wels-Keywords, Bewertungen und technische Performance. Alles ist in unseren Paketen enthalten.'],
                    ['q' => 'Gibt es Support nach dem Go-Live?', 'a' => '30 Tage kostenloser Support plus optionales Wartungspaket mit Updates, Backups und Sicherheitschecks.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Jetzt Welser Projekt anfragen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
