<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Services\SeoCheck;
use App\Services\CookieCheck;
use Illuminate\Support\Facades\RateLimiter;

new class extends Component {
    public ?array $pageSchema = null;
    public string $url = '';
    public ?array $result = null;
    public ?string $error = null;

    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = $siteUrl . '/tools/cookie-check';

        SEOMeta::setTitle('Cookie Check – Tracker & DSGVO gratis prüfen');
        SEOMeta::setDescription(
            'Gratis Cookie-Check: Welche Drittanbieter und Tracker lädt deine Website? Inventur in Sekunden – mit DSGVO-Einschätzung.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['Cookie Check', 'DSGVO Check', 'Tracker prüfen', 'Cookie Banner Test']);

        OpenGraph::setTitle('Cookie Check – Tracker auf deiner Website finden | Websters');
        OpenGraph::setDescription('Drittanbieter, Tracker und Cookies in Sekunden inventiert – gratis DSGVO-Selbstcheck.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Cookie Check von Websters']);

        TwitterCard::setTitle('Cookie Check gratis | Websters');
        TwitterCard::setDescription('Tracker & Drittanbieter finden – gratis.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'WebApplication';
$schema['name'] = 'Cookie Check von Websters';
$schema['description'] = 'Inventur von Drittanbietern, Trackern und Cookies einer Website.';
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
        $key = 'cookiecheck:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 6)) {
            $this->error = 'Bitte kurz warten (Schutz vor Missbrauch).';
            $this->dispatch('check-done');

            return;
        }
        RateLimiter::hit($key, 120);

        $url = SeoCheck::normalizeUrl($this->url);
        if ($url === null) {
            $this->error = 'Bitte eine gültige öffentliche URL eingeben (z. B. beispiel.at).';
            $this->dispatch('check-done');

            return;
        }
        $res = CookieCheck::analyze($url);
        if (! ($res['ok'] ?? false)) {
            $this->error = $res['error'];
            $this->dispatch('check-done');

            return;
        }
        $this->result = $res;
        $this->dispatch('check-done');
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Cookie Check: Was lädt deine Website alles nach?
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                URL eingeben – wir listen Drittanbieter, bekannte Tracker und Cookies auf und sagen dir, ob dein Cookie-Banner reicht.
            </p>
            <form wire:submit="analyze" x-data="{ busy: false }" @submit="busy = true" @check-done.window="busy = false" class="mt-6 w-full sm:w-2/3 md:w-1/2 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <div class="flex flex-col sm:flex-row gap-2">
                    <input type="text" wire:model="url" required maxlength="120" autocomplete="off" spellcheck="false" placeholder="z. B. deine-website.at" class="input input-bordered w-full text-brand-dark">
                    <button type="submit" class="btn btn-primary text-white whitespace-nowrap" :disabled="busy">
                        <span x-show="!busy">Prüfen</span>
                        <span x-show="busy" x-cloak class="flex items-center gap-2"><span class="loading loading-spinner loading-xs"></span>Prüfe …</span>
                    </button>
                </div>
                @if($error)<p class="mt-3 text-sm text-red-600">{{ $error }}</p>@endif
            </form>
        </div>
    </section>

    <div x-data="{ busy: false }" @submit.window="busy = true" @check-done.window="busy = false" x-show="busy" x-cloak class="pb-12">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6 animate-pulse">
                <div class="h-6 w-1/3 rounded bg-slate-200"></div>
                <div class="mt-4 space-y-2">
                    @for($i = 0; $i < 4; $i++)<div class="h-4 rounded bg-slate-100"></div>@endfor
                </div>
            </div>
        </div>
    </div>

    @if($result)
        <section class="pb-12 lg:pb-16">
            <div class="max-w-7xl mx-auto px-4 xl:px-0">
                <div class="rounded-2xl p-6 text-white {{ $result['level'] === 'green' ? 'bg-green-700' : ($result['level'] === 'yellow' ? 'bg-amber-600' : 'bg-red-700') }}">
                    <div class="font-bold text-xl">{{ $result['level'] === 'green' ? 'Sauber: keine Drittanbieter gefunden.' : ($result['level'] === 'yellow' ? 'Achtung: Drittanbieter gefunden – Banner prüfen.' : 'Handlungsbedarf: bekannte Tracker gefunden.') }}</div>
                    <div class="text-sm opacity-80">{{ $result['url'] }} · {{ $result['thirdCount'] }} Drittanbieter-Hosts · {{ count($result['trackers']) }} bekannte Tracker</div>
                </div>

                @if(count($result['trackers']) > 0)
                    <h2 class="mt-8 text-xl font-bold text-brand-dark">Erkannte Tracker</h2>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach($result['trackers'] as $t)<span class="badge badge-error text-white">{{ $t }}</span>@endforeach
                    </div>
                    <p class="mt-3 text-sm text-neutral-600">Diese Dienste brauchen vor dem Laden eine echte Einwilligung (Cookie-Banner mit Opt-in). Ohne Banner: Abmahngefahr.</p>
                @endif

                @if(count($result['gated'] ?? []) > 0)
                    <h2 class="mt-8 text-xl font-bold text-brand-dark">Sauber gelöst (erst nach Einwilligung)</h2>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach($result['gated'] as $t)<span class="badge badge-success text-white">{{ $t }} ✓ 2-Klick</span>@endforeach
                    </div>
                    <p class="mt-3 text-sm text-neutral-600">Diese Dienste laden erst nach Klick (2-Klick-Lösung) – vorbildlich umgesetzt.</p>
                @endif

                @if(count($result['third']) > 0)
                    <h2 class="mt-8 text-xl font-bold text-brand-dark">Drittanbieter-Hosts</h2>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($result['third'] as $host => $n)
                            <div class="rounded-xl border border-slate-200 bg-white/60 px-3 py-2 text-sm font-mono break-all">{{ $host }} <span class="text-slate-400">×{{ $n }}</span></div>
                        @endforeach
                    </div>
                @endif

                @if(count($result['cookies']) > 0)
                    <h2 class="mt-8 text-xl font-bold text-brand-dark">Gesetzte Cookies (Startseite)</h2>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($result['cookies'] as $c)<div class="rounded-xl border border-slate-200 bg-white/60 px-3 py-2 text-sm font-mono break-all">{{ $c }}</div>@endforeach
                    </div>
                @endif

                <p class="mt-6 text-xs text-slate-500">Hinweis: Momentaufnahme der Startseite ohne Rechtsberatung. Ob alles passt, hängt auch vom Banner-Verhalten ab (Opt-in vor Laden).</p>

                <div class="mt-6 rounded-2xl border border-slate-200 bg-white/60 p-6">
                    <div class="font-bold text-brand-dark text-lg">DSGVO-sicher machen lassen?</div>
                    <p class="mt-2 text-sm text-neutral-600">Cookie-Banner mit echtem Opt-in, Google-Fonts lokal, Tracking datensparsam – Festpreis nach kostenlosem Check.</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="tel:+4367763177763" class="btn btn-sm btn-primary text-white">Anrufen</a>
                        <a href="/kontakt" class="btn btn-sm btn-neutral text-white">DSGVO-Fix anfragen</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zum Cookie Check</h2>
            @php
                $faqs = [
                    ['q' => 'Was genau findet der Cookie Check?', 'a' => 'Alle externen Hosts, die deine Startseite nachlädt (Schriften, Karten, Videos, Chats), bekannte Tracker (Analytics, Pixel & Co.) und die gesetzten Cookies – als Inventur mit Ampel-Einschätzung.'],
                    ['q' => 'Ersetzt das eine Rechtsberatung?', 'a' => 'Nein. Es ist eine technische Momentaufnahme, die zeigt, wo du hinschauen musst. Für Rechtssicherheit kombiniere das Ergebnis mit Beratung – wir arbeiten mit klaren To-dos.'],
                    ['q' => 'Was ist das häufigste Problem?', 'a' => 'US-Tracker (Google Analytics, Fonts, Maps, YouTube) ohne Einwilligung sowie Cookie-Banner, die nur „OK" kennen statt echter Auswahl. Beides fixen wir als Paket.'],
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
