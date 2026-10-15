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
        $pageUrl = $siteUrl . '/branchen/hotel-tourismus-website';

        SEOMeta::setTitle('Website für Hotels & Tourismus ab 990€');
        SEOMeta::setDescription(
            'Webdesign für Hotellerie & Tourismus: Direktbuchung, Mehrsprachigkeit & Google-Profil – Websites ab 990€ aus Oberösterreich für Betriebe in AT & DE.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Website Hotel', 'Hotel Website erstellen', 'Webdesign Tourismus',
            'Hotel Homepage', 'Tourismus SEO',
        ]);

        OpenGraph::setTitle('Website für Hotels & Tourismus | Websters');
        OpenGraph::setDescription('Hotel-Websites ab 990€, die Betten füllen – mit Direktbuchung statt Provision.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Website für Hotellerie von Websters']);

        TwitterCard::setTitle('Hotel-Website ab 990€ | Websters');
        TwitterCard::setDescription('Webdesign für Hotels – die direkt verkauft.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'Service';
        $schema['name'] = 'Webdesign für Hotellerie und Tourismus';
        $schema['description'] = 'Hotel-Websites mit Wirkung: Buchung, Sprachen, Bewertungen.';
        $schema['url'] = $pageUrl;
        $schema['provider'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
        $schema['areaServed'] = [['@type' => 'Country', 'name' => 'Österreich'], ['@type' => 'Country', 'name' => 'Deutschland']];
        $schema['offers'] = ['@type' => 'Offer', 'name' => 'Hotel-Website', 'priceCurrency' => 'EUR', 'price' => 990,
            'itemOffered' => ['@type' => 'Service', 'name' => 'Webdesign für Hotellerie']];
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
                Website für Hotels & Tourismus: Direktbuchungen statt Provision
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Gäste googeln „Hotel + Region" – und entscheiden nach Bildern, Bewertungen und Preis. Wir bauen Hotel-Websites ab 990€ mit Direktbuchung, Mehrsprachigkeit und Google-Profil, die Betten füllen.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 lg:mt-5 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <a href="/kontakt" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Hotel-Projekt anfragen</a>
                <a href="/leistungen/webdesign" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Pakete ansehen</a>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Was eine gute Hotel-Website kann</h2>
            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Direktbuchung ohne Provision', 'Jede Buchung über deine Website spart 15–20% Portal-Provision – bei gleichem Aufwand mehr Ertrag.'],
                    ['Mehrsprachig & gästefreundlich', 'Deutsch, Englisch und mehr – Gäste verstehen Angebot, Preise und Anreise.'],
                    ['Bewertungen, die verkaufen', 'Google- und Holidaycheck-Bewertungen prominent, Bilder die Lust machen – aus Suchenden werden Buchende.'],
                    ['Saison-Content ohne Aufwand', 'Arrangements, Events, Pauschalen: aktuell halten in Minuten – auch vom Handy an der Rezeption.'],
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
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zur Hotel-Website</h2>
            @php
                $faqs = [
                    ['q' => 'Was kostet eine Hotel-Website?', 'a' => 'Ab 990€ (Starter: Zimmer, Kontakt, Anfahrt), 1.990€ (Komplett mit Buchung, Mehrsprachigkeit, erweiterter SEO). Festpreis vorab.'],
                    ['q' => 'Braucht ein Hotel wirklich SEO?', 'a' => 'Unbedingt: Fast alle Gäste suchen und buchen online. Wer bei „Hotel + Region" nicht auftaucht, verschenkt jede Buchung an Portale mit Provision.'],
                    ['q' => 'Wie binde ich mein Buchungssystem an?', 'a' => 'Wir binden gängige Systeme (z. B. Availpro, CultBooking, Feratel) ein oder bauen schlanke Direkt-Anfragen – immer datenschutzkonform.'],
                    ['q' => 'Wie schnell ist die Hotel-Website vor der Saison online?', 'a' => 'Starter in 2–3 Wochen, Komplett in 4–6 Wochen. Plane 2 Monate vor Saisonstart – dann läuft alles rund.'],
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
                <a href="/kontakt" class="btn btn-primary text-white">Hotel-Projekt besprechen</a>
                <a href="/projekte" class="btn btn-neutral text-white">Referenzen ansehen</a>
            </div>
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
