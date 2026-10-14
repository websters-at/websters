<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Services\DomainAvailability;
use Illuminate\Support\Facades\RateLimiter;

new class extends Component {
    public ?array $pageSchema = null;
    public string $query = '';
    public ?array $results = null;
    public ?string $error = null;
    public ?string $searched = null;

    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = $siteUrl . '/tools/domain-check';

        SEOMeta::setTitle('Domain prüfen – Verfügbarkeit checken (.at, .com, .de)');
        SEOMeta::setDescription(
            'Gratis Domain-Check: Prüfe in Sekunden, ob deine Wunsch-Domain (.at, .com, .de, .eu, .org, .net) frei ist – inkl. Alternativen. Danach direkt anrufen oder mailen.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Domain prüfen', 'Domain Verfügbarkeit', 'Domain check .at',
            'Freie Domain finden', 'Domain registrieren Österreich', '.at Domain prüfen',
        ]);

        OpenGraph::setTitle('Domain prüfen – ist deine Wunsch-Domain frei? | Websters');
        OpenGraph::setDescription('Kostenloser Domain-Check für .at, .com, .de, .org & .net – mit Alternativen und direkter Anfrage per Anruf oder Mail.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Domain prüfen bei Websters']);

        TwitterCard::setTitle('Domain prüfen – gratis Domain-Check | Websters');
        TwitterCard::setDescription('.at, .com, .de & mehr in Sekunden prüfen – inkl. Alternativen.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'WebApplication';
$schema['name'] = 'Domain-Check von Websters';
$schema['description'] = 'Kostenlos prüfen, ob eine Domain (.at, .com, .de, .eu, .org, .net) verfügbar ist – mit Alternativ-Vorschlägen.';
$schema['url'] = $pageUrl;
$schema['applicationCategory'] = 'UtilitiesApplication';
$schema['operatingSystem'] = 'Webbrowser';
$schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
$this->pageSchema = $schema;
    }

    public function search(): void
    {
        $this->error = null;
        $key = 'domain-check:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 10)) {
            $this->error = 'Bitte kurz warten und erneut versuchen (Schutz vor Missbrauch).';

            return;
        }
        RateLimiter::hit($key, 60);

        $normalized = DomainAvailability::normalize($this->query);
        if ($normalized === null) {
            $this->error = 'Bitte einen gültigen Domain-Namen eingeben (z. B. wunschname oder wunschname.at).';
            $this->results = null;

            return;
        }
        // Nur der Namens-Teil zählt für die Suche.
        $stem = strtok($normalized, '.');
        $this->searched = $stem;
        $this->results = DomainAvailability::checkName($stem);
    }

    public function mailHref(string $domain): string
    {
        return 'mailto:office@websters.at'
            . '?subject=' . rawurlencode('Domain-Anfrage: ' . $domain)
            . '&body=' . rawurlencode("Hallo Websters-Team,\n\nich interessiere mich für die Domain {$domain}. Bitte meldet euch bei mir mit Infos zu Registrierung und Preisen.\n\nName:\nTelefon:");
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-16 lg:pt-40 lg:pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Gratis Tool</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                Domain prüfen: Ist deine Wunsch-Domain noch frei?
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Gib deinen Wunschnamen ein – wir prüfen live .at, .com, .de, .org und .net und schlagen Alternativen vor. Ist sie frei, ruf einfach an oder schick uns eine Mail.
            </p>

            <form wire:submit="search" class="mt-6 w-full sm:w-2/3 md:w-1/2 fade-up" :class="{ 'show': show }" style="transition-delay:.3s">
                <div class="flex flex-col sm:flex-row gap-2">
                    <input
                        type="text" wire:model="query" required maxlength="60" autocomplete="off" spellcheck="false"
                        placeholder="z. B. meinefirma"
                        class="input input-bordered w-full text-brand-dark"
                    >
                    <button type="submit" class="btn btn-primary text-white whitespace-nowrap" wire:loading.attr="disabled">
                        <span wire:loading.remove>Domain prüfen</span>
                        <span wire:loading>Prüfe …</span>
                    </button>
                </div>
                @if($error)
                    <p class="mt-3 text-sm text-red-600">{{ $error }}</p>
                @endif
            </form>
        </div>
    </section>

    <div wire:loading class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @for($i = 0; $i < 5; $i++)
                    <div class="rounded-2xl border border-slate-200 bg-white/60 p-4 animate-pulse">
                        <div class="h-5 w-2/3 rounded bg-slate-200"></div>
                        <div class="mt-3 h-8 w-1/2 rounded bg-slate-100"></div>
                    </div>
                @endfor
            </div>
            <p class="mt-4 text-sm text-slate-500">Prüfe Registry-Daten für .at, .com, .de, .org und .net …</p>
        </div>
    </div>

    @if($results)
        <section class="pb-12 lg:pb-16 min-h-[20rem]">
            <div class="max-w-7xl mx-auto px-4 xl:px-0">
                @if(count($results['exact']) === 0)
                    <div class="rounded-2xl border border-amber-300 bg-amber-50 p-5 text-sm text-amber-900">
                        Die Registries antworten gerade nicht – bitte in einer Minute erneut prüfen.
                    </div>
                @else
                <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Ergebnis für „{{ $searched }}"</h2>
                <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($results['exact'] as $r)
                        <div class="rounded-2xl border border-slate-200 bg-white/60 p-4">
                            <div class="flex items-center justify-between gap-2">
                                <div class="font-semibold text-brand-dark break-all">{{ $r['domain'] }}</div>
                                @if($r['available'] === true)
                                    <span class="badge badge-success text-white whitespace-nowrap">frei</span>
                                @elseif($r['available'] === false)
                                    <span class="badge badge-error text-white whitespace-nowrap">belegt</span>
                                @else
                                    <span class="badge badge-ghost whitespace-nowrap">unbekannt</span>
                                @endif
                            </div>
                            @if($r['available'] === true)
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <a href="tel:+4367763177763" class="btn btn-xs btn-primary text-white gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg>Anrufen</a>
                                    <a href="{{ $this->mailHref($r['domain']) }}" class="btn btn-xs btn-neutral text-white gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>Per Mail anfragen</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if(count($results['suggestions']) > 0)
                    <h2 class="mt-10 text-xl lg:text-2xl font-bold text-brand-dark">Alternativen, die noch frei sein könnten</h2>
                    <div class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($results['suggestions'] as $r)
                            <div class="rounded-2xl border border-slate-200 bg-white/60 p-3">
                                <div class="flex items-center justify-between gap-2">
                                    <div class="text-sm font-semibold text-brand-dark break-all">{{ $r['domain'] }}</div>
                                    @if($r['available'] === true)
                                        <span class="badge badge-success badge-sm text-white">frei</span>
                                    @elseif($r['available'] === false)
                                        <span class="badge badge-error badge-sm text-white">belegt</span>
                                    @else
                                        <span class="badge badge-ghost badge-sm">?</span>
                                    @endif
                                </div>
                                @if($r['available'] === true)
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <a href="tel:+4367763177763" class="btn btn-xs btn-primary text-white gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg>Anrufen</a>
                                        <a href="{{ $this->mailHref($r['domain']) }}" class="btn btn-xs btn-neutral text-white gap-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>Mail</a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="mt-8 rounded-2xl bg-brand-dark text-white p-6">
                    <div class="font-bold text-lg">Domain gefunden? Wir registrieren sie für dich.</div>
                    <p class="mt-2 text-sm opacity-80">Anruf genügt – wir prüfen final, registrieren die Domain und bauen auf Wunsch gleich die Website dazu. Alles aus einer Hand in Oberösterreich.</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="tel:+4367763177763" class="btn btn-sm btn-primary text-white">+43 677 63177763 anrufen</a>
                        <a href="mailto:office@websters.at?subject={{ rawurlencode('Domain-Anfrage') }}" class="btn btn-sm btn-neutral text-white">Mail schreiben</a>
                    </div>
                </div>
                @endif
            </div>
        </section>
    @endif

    <section class="pb-12 lg:pb-16" id="faq">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zum Domain-Check</h2>
            @php
                $faqs = [
                    ['q' => 'Wie prüft ihr, ob eine Domain frei ist?', 'a' => 'Über RDAP, die offizielle Schnittstelle der Domain-Registries: Ist eine Domain registriert, antwortet die Registry – ist sie frei, kommt keine Antwort. Das ist dieselbe Quelle, die auch Domain-Händler nutzen.'],
                    ['q' => 'Was kostet eine .at-Domain?', 'a' => 'Eine .at-Domain kostet typischerweise 10–20€ pro Jahr plus einmalige Registrierungsgebühr. Wir übernehmen Registrierung und Verwaltung für dich – frag einfach per Anruf oder Mail an.'],
                    ['q' => 'Meine Wunsch-Domain ist belegt – was nun?', 'a' => 'Unsere Vorschläge (z. B. get-, online- oder -hq-Varianten und andere Endungen wie .at statt .com) sind oft sogar stärker. Oder wir fragen beim Inhaber an, ob die Domain käuflich ist.'],
                    ['q' => 'Kann ich Domain und Website aus einer Hand bekommen?', 'a' => 'Ja, genau dafür sind wir da: Domain registrieren, Hosting einrichten, Website ab 990€ bauen, E-Mail einrichten – alles bei Websters in Oberösterreich.'],
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
        </div>
    </section>
</div>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
