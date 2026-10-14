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
        $pageUrl = $siteUrl . '/tools';

        SEOMeta::setTitle('Gratis Tools – Domain-Check & Preis-Rechner');
        SEOMeta::setDescription(
            'Kostenlose Websters-Tools: Domain-Verfügbarkeit prüfen und Website-Preis in 1 Minute berechnen. Für alle, die online durchstarten wollen.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['Websters Tools', 'Domain Check', 'Website Preis Rechner', 'Gratis SEO Tools']);

        OpenGraph::setTitle('Gratis Tools von Websters');
        OpenGraph::setDescription('Domain-Check & Website-Preis-Rechner – kostenlos und ohne Anmeldung.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Gratis Tools von Websters']);

        TwitterCard::setTitle('Gratis Tools | Websters');
        TwitterCard::setDescription('Domain-Check & Preis-Rechner – gratis.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'CollectionPage';
$schema['name'] = 'Gratis Tools von Websters';
$schema['description'] = 'Übersicht aller kostenlosen Websters-Tools.';
$schema['url'] = $pageUrl;
$this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 lg:mt-9 lg:leading-tight fade-up" :class="{ 'show': show }">
                Gratis Tools für deinen Web-Erfolg
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.15s">
                Kostenlos, ohne Anmeldung, sofort nutzbar – schick die Seite gern an Kunden und Bekannte weiter.
            </p>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 grid gap-4 md:grid-cols-2">
            <a href="/tools/domain-check" wire:navigate class="rounded-2xl border border-slate-200 bg-white/60 p-6 hover:border-brand-dark hover:shadow-lg transition-all fade-up" :class="{ 'show': show }">
                <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs text-white">Beliebt</div>
                <div class="mt-3 font-bold text-brand-dark text-xl">Domain-Check</div>
                <p class="mt-2 text-sm text-neutral-600">Ist deine Wunsch-Domain (.at, .com, .de, .org, .net) noch frei? Live prüfen inkl. Alternativen – danach direkt anrufen oder mailen.</p>
                <span class="btn btn-sm btn-primary mt-4 text-white">Jetzt prüfen</span>
            </a>
            <a href="/tools/preis-rechner" wire:navigate class="rounded-2xl border border-slate-200 bg-white/60 p-6 hover:border-brand-dark hover:shadow-lg transition-all fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs text-white">Neu</div>
                <div class="mt-3 font-bold text-brand-dark text-xl">Website Preis-Rechner</div>
                <p class="mt-2 text-sm text-neutral-600">5 Fragen anklicken, sofort Preis-Schätzung erhalten – und auf Wunsch gleich das kostenlose Festpreis-Angebot anfordern.</p>
                <span class="btn btn-sm btn-primary mt-4 text-white">Preis berechnen</span>
            </a>
            <a href="/tools/seo-check" wire:navigate class="rounded-2xl border border-slate-200 bg-white/60 p-6 hover:border-brand-dark hover:shadow-lg transition-all fade-up" :class="{ 'show': show }" style="transition-delay:.15s">
                <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs text-white">Neu</div>
                <div class="mt-3 font-bold text-brand-dark text-xl">SEO Check</div>
                <p class="mt-2 text-sm text-neutral-600">11 SEO-Faktoren in Sekunden geprüft: Title, H1, Bilder, Speed & mehr – mit Punktestand und Tipps.</p>
                <span class="btn btn-sm btn-primary mt-4 text-white">Website testen</span>
            </a>
            <a href="/tools/cookie-check" wire:navigate class="rounded-2xl border border-slate-200 bg-white/60 p-6 hover:border-brand-dark hover:shadow-lg transition-all fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs text-white">Neu</div>
                <div class="mt-3 font-bold text-brand-dark text-xl">Cookie Check</div>
                <p class="mt-2 text-sm text-neutral-600">Welche Tracker und Drittanbieter lädt deine Website? Inventur in Sekunden mit DSGVO-Einschätzung.</p>
                <span class="btn btn-sm btn-primary mt-4 text-white">Tracker finden</span>
            </a>
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
