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
        $pageUrl = $siteUrl . '/branchen';

        SEOMeta::setTitle('Branchen-Websites: Anwalt, Arzt, Gastro, Handwerk');
        SEOMeta::setDescription(
            'Webdesign nach Branche: Kanzlei, Praxis, Gastronomie & Handwerk – Websites ab 990€ mit den Funktionen, die deine Kunden wirklich brauchen.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['Branchen Webdesign', 'Website Anwalt', 'Website Arzt', 'Gastro Website', 'Handwerk Website']);

        OpenGraph::setTitle('Branchenlösungen von Websters');
        OpenGraph::setDescription('Websites für Kanzlei, Praxis, Gastro & Handwerk – ab 990€, mit Branchen-Funktionen.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Branchenlösungen von Websters']);

        TwitterCard::setTitle('Branchenlösungen | Websters');
        TwitterCard::setDescription('Websites für Anwalt, Arzt, Gastro & Handwerk.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'CollectionPage';
        $schema['name'] = 'Branchenlösungen von Websters';
        $schema['description'] = 'Übersicht aller Branchen-Websites.';
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
                Websites für deine Branche – ab 990€
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.15s">
                Kein 08/15-Template: Jede Branche bekommt die Funktionen, die ihre Kunden brauchen – vom Mandanten bis zum Gast.
            </p>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 grid gap-4 md:grid-cols-2">
            @foreach([
                ['u' => '/branchen/anwalt-kanzlei-website', 't' => 'Anwälte & Kanzleien', 'd' => 'Vertrauen, Local SEO, Erstberatung als Call-to-Action – Mandanten gewinnen im Schlaf.'],
                ['u' => '/branchen/arzt-praxis-website', 't' => 'Ärzte & Praxen', 'd' => 'Online-Terminbuchung, Leistungen, Barrierefreiheit – volle Kalender statt Telefon-Warteschleife.'],
                ['u' => '/branchen/gastro-restaurant-website', 't' => 'Gastro & Restaurants', 'd' => 'Speisekarte, Reservierung, Bewertungen – Tische füllen statt Stühle zählen.'],
                ['u' => '/branchen/handwerk-website', 't' => 'Handwerk & Gewerbe', 'd' => 'Vorher-Nachher, Angebots-Anfrage, Local SEO – Aufträge statt Kaltakquise.'],
                ['u' => '/branchen/immobilien-website', 't' => 'Immobilien & Makler', 'd' => 'Exposés, Objekte und Anfragen, die Besichtigungen bringen – statt Portal-Provision.'],
                ['u' => '/branchen/hotel-tourismus-website', 't' => 'Hotels & Tourismus', 'd' => 'Direktbuchung, Mehrsprachigkeit, Bewertungen – Betten füllen statt Provision zahlen.'],
            ] as $i => $b)
                <a href="{{ $b['u'] }}" wire:navigate class="group rounded-2xl border border-slate-200 bg-white/60 p-6 hover:border-brand-dark hover:shadow-xl hover:-translate-y-1 transition-all duration-300 fade-up" :class="{ 'show': show }" style="transition-delay:.{{ 5 + $i * 5 }}s">
                    <div class="font-bold text-brand-dark text-xl">{{ $b['t'] }} <span class="inline-block transition-transform group-hover:translate-x-1">→</span></div>
                    <p class="mt-2 text-sm text-neutral-600">{{ $b['d'] }}</p>
                </a>
            @endforeach
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
