<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Services\SeoCheck;
use Illuminate\Support\Facades\RateLimiter;

new class extends Component {
    public ?array $pageSchema = null;
    public string $url = '';
    public ?array $result = null;
    public ?string $error = null;

    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = $siteUrl . '/tools/seo-check';

        SEOMeta::setTitle('SEO Check – Website gratis analysieren');
        SEOMeta::setDescription(
            'Kostenloser SEO-Selbstcheck: Title, Description, H1, Bilder, Canonical, Ladezeit & mehr in Sekunden prüfen – mit konkreten Tipps.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['SEO Check', 'SEO Analyse gratis', 'Website prüfen', 'SEO Test']);

        OpenGraph::setTitle('SEO Check – deine Website im Gratis-Test | Websters');
        OpenGraph::setDescription('11 SEO-Faktoren in Sekunden geprüft: Title, H1, Bilder, Speed & mehr.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'SEO Check von Websters']);

        TwitterCard::setTitle('SEO Check gratis | Websters');
        TwitterCard::setDescription('Website in Sekunden auf SEO prüfen.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'WebApplication';
$schema['name'] = 'SEO Check von Websters';
$schema['description'] = 'Kostenloser Selbstcheck für Suchmaschinenoptimierung.';
$schema['url'] = $pageUrl;
$schema['applicationCategory'] = 'UtilitiesApplication';
$schema['operatingSystem'] = 'Webbrowser';
$schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
$this->pageSchema = $schema;
    }

    public function analyze(): void
    {
        $this->error = null;
        $this->result = null;
        $key = 'seocheck:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 6)) {
            $this->error = 'Bitte kurz warten (Schutz vor Missbrauch).';

            return;
        }
        RateLimiter::hit($key, 120);

        $url = SeoCheck::normalizeUrl($this->url);
        if ($url === null) {
            $this->error = 'Bitte eine gültige öffentliche URL eingeben (z. B. beispiel.at).';

            return;
        }
        $res = SeoCheck::analyze($url);
        if (! ($res['ok'] ?? false)) {
            $this->error = $res['error'];

            return;
        }
        $this->result = $res;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Gratis Tool</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                SEO Check: Wie gut ist deine Website wirklich?
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                URL eingeben, 11 SEO-Faktoren prüfen lassen – mit Punktestand und konkreten Tipps. Dauert Sekunden.
            </p>
            <form wire:submit="analyze" class="mt-6 w-full sm:w-2/3 md:w-1/2 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <div class="flex flex-col sm:flex-row gap-2">
                    <input type="text" wire:model="url" required maxlength="120" autocomplete="off" spellcheck="false" placeholder="z. B. deine-website.at" class="input input-bordered w-full text-brand-dark">
                    <button type="submit" class="btn btn-primary text-white whitespace-nowrap" wire:loading.attr="disabled">
                        <span wire:loading.remove>Prüfen</span><span wire:loading>Prüfe …</span>
                    </button>
                </div>
                @if($error)<p class="mt-3 text-sm text-red-600">{{ $error }}</p>@endif
            </form>
        </div>
    </section>

    <div wire:loading class="pb-12">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6 animate-pulse">
                <div class="h-6 w-1/3 rounded bg-slate-200"></div>
                <div class="mt-4 space-y-2">
                    @for($i = 0; $i < 5; $i++)<div class="h-4 rounded bg-slate-100"></div>@endfor
                </div>
            </div>
        </div>
    </div>

    @if($result)
        <section class="pb-12 lg:pb-16">
            <div class="max-w-7xl mx-auto px-4 xl:px-0">
                <div class="rounded-2xl bg-brand-dark text-white p-6 flex flex-wrap items-center gap-6">
                    <div class="text-5xl font-bold">{{ $result['score'] }}<span class="text-xl opacity-60">/100</span></div>
                    <div>
                        <div class="font-bold">{{ $result['url'] }}</div>
                        <div class="text-sm opacity-70">{{ $result['ms'] }} ms Antwortzeit · {{ count(array_filter($result['checks'], fn($c) => $c['ok'])) }} von {{ count($result['checks']) }} Checks bestanden</div>
                    </div>
                </div>
                <div class="mt-6 grid gap-3 md:grid-cols-2">
                    @foreach($result['checks'] as $c)
                        <div class="rounded-2xl border p-4 {{ $c['ok'] ? 'border-green-200 bg-green-50/60' : 'border-red-200 bg-red-50/60' }}">
                            <div class="flex items-center gap-2 font-semibold {{ $c['ok'] ? 'text-green-800' : 'text-red-800' }}">
                                <span>{{ $c['ok'] ? '✓' : '✗' }}</span><span>{{ $c['label'] }}</span>
                            </div>
                            <p class="mt-1 text-sm text-neutral-600">{{ $c['hint'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8 rounded-2xl border border-slate-200 bg-white/60 p-6">
                    <div class="font-bold text-brand-dark text-lg">Rote Kreuze dabei? Wir fixen das.</div>
                    <p class="mt-2 text-sm text-neutral-600">SEO-Audit mit Maßnahmenplan und Umsetzung aus einer Hand – Festpreis nach kostenlosem Check.</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="tel:+4367763177763" class="btn btn-sm btn-primary text-white">Anrufen</a>
                        <a href="/kontakt" class="btn btn-sm btn-neutral text-white">SEO-Audit anfragen</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zum SEO Check</h2>
            @php
                $faqs = [
                    ['q' => 'Was prüft der SEO Check genau?', 'a' => '11 Faktoren: HTTPS, Title (vorhanden + Länge), Meta-Description, genau eine H1, Alt-Texte, Canonical, Open Graph, strukturierte Daten, Antwortzeit und Seitengröße – mit Punktestand und Tipps pro Punkt.'],
                    ['q' => 'Ist der Check wirklich kostenlos?', 'a' => 'Ja, komplett gratis und ohne Anmeldung. Für eine tiefe Analyse (Keywords, Konkurrenz, Technik) gibt es unser SEO-Audit als Festpreis-Leistung.'],
                    ['q' => 'Speichert ihr meine URL?', 'a' => 'Nein. Die Prüfung läuft live und es wird nichts gespeichert oder weitergegeben.'],
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
