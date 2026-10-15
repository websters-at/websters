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
        $pageUrl = $siteUrl . '/tools/utm-builder';

        SEOMeta::setTitle('UTM Builder – Kampagnen-Links erstellen');
        SEOMeta::setDescription(
            'Gratis UTM-Builder: Tracking-Links für Google Analytics & Newsletter in Sekunden bauen – mit Copy-Button und Live-Vorschau.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['UTM Builder', 'UTM Link erstellen', 'Kampagnen Tracking']);

        OpenGraph::setTitle('UTM Builder – Tracking-Links gratis | Websters');
        OpenGraph::setDescription('UTM-Parameter korrekt setzen: Source, Medium, Campaign – Link kopieren, fertig.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'UTM Builder von Websters']);

        TwitterCard::setTitle('UTM Builder | Websters');
        TwitterCard::setDescription('Tracking-Links bauen – gratis.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'WebApplication';
        $schema['name'] = 'UTM Builder von Websters';
        $schema['description'] = 'Erstellt UTM-getaggte Kampagnen-Links lokal im Browser.';
        $schema['url'] = $pageUrl;
        $schema['applicationCategory'] = 'UtilitiesApplication';
        $schema['operatingSystem'] = 'Webbrowser';
        $schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="utmBuilder()">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white">Gratis Tool</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5">
                UTM Builder: saubere Tracking-Links in Sekunden
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                URL + Kampagnendaten eingeben, fertigen Link kopieren – läuft komplett lokal in deinem Browser.
            </p>
        </div>
    </section>

    <section class="pb-8">
        <div class="max-w-3xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6 space-y-3">
                <div>
                    <label class="text-sm font-semibold text-brand-dark">Ziel-URL *</label>
                    <input type="url" x-model="url" placeholder="https://deine-seite.at/angebot" class="input input-bordered w-full mt-1 text-brand-dark">
                </div>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-sm font-semibold text-brand-dark">Quelle (utm_source) *</label><input type="text" x-model="source" placeholder="z. B. newsletter" class="input input-bordered w-full mt-1 text-brand-dark"></div>
                    <div><label class="text-sm font-semibold text-brand-dark">Medium (utm_medium) *</label><input type="text" x-model="medium" placeholder="z. B. email" class="input input-bordered w-full mt-1 text-brand-dark"></div>
                    <div><label class="text-sm font-semibold text-brand-dark">Kampagne (utm_campaign) *</label><input type="text" x-model="campaign" placeholder="z. B. herbst2026" class="input input-bordered w-full mt-1 text-brand-dark"></div>
                    <div><label class="text-sm font-semibold text-brand-dark">Anzeigen-Variante (utm_content)</label><input type="text" x-model="content" placeholder="z. B. button-oben" class="input input-bordered w-full mt-1 text-brand-dark"></div>
                </div>
                <div class="rounded-xl bg-slate-50 border border-slate-200 p-3">
                    <div class="text-xs font-semibold text-slate-500">FERTIGER LINK</div>
                    <div class="mt-1 text-sm font-mono break-all text-brand-dark" x-text="built() || '–'"></div>
                </div>
                <button type="button" @click="copy()" class="btn btn-primary text-white" x-text="copied ? 'Kopiert!' : 'Link kopieren'"></button>
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu UTM-Parametern</h2>
            @php
                $faqs = [
                    ['q' => 'Was sind UTM-Parameter?', 'a' => 'Anhängsel an Links (?utm_source=...), mit denen Analytics-Tools erkennen, woher Besucher kommen. Pflicht für Newsletter, Ads und Social Posts, wenn du wissen willst, was funktioniert.'],
                    ['q' => 'Welche UTM-Parameter sind Pflicht?', 'a' => 'Source (woher: newsletter, google, instagram), Medium (wie: email, cpc, social) und Campaign (welche Aktion). Content und Term sind optional für Varianten-Tests.'],
                    ['q' => 'Klein- oder Großschreibung?', 'a' => 'Immer klein, keine Umlaute, keine Leerzeichen (Bindestriche statt dessen). Analytics unterscheidet Groß/Kleinschreibung – sonst zerfällt deine Statistik in Dubletten.'],
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
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif

<script>
function utmBuilder() {
    return {
        url: '', source: '', medium: '', campaign: '', content: '', copied: false,
        built() {
            let u = this.url.trim();
            if (!u) return '';
            if (!/^https?:\/\//i.test(u)) u = 'https://' + u;
            try {
                const o = new URL(u);
                const q = (k, v) => { v = v.trim().toLowerCase().replace(/\s+/g, '-'); if (v) o.searchParams.set(k, v); };
                q('utm_source', this.source); q('utm_medium', this.medium);
                q('utm_campaign', this.campaign); q('utm_content', this.content);
                return o.toString();
            } catch (e) { return ''; }
        },
        copy() {
            const l = this.built();
            if (!l) return;
            navigator.clipboard.writeText(l).then(() => {
                this.copied = true;
                setTimeout(() => this.copied = false, 2000);
            });
        },
    };
}
</script>
