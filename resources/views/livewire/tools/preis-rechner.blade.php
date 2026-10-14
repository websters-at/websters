<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Models\Lead;
use Illuminate\Support\Facades\RateLimiter;
use Mary\Traits\Toast;

new class extends Component {
    public ?array $pageSchema = null;
    use Toast;

    public string $name = '';
    public string $email = '';
    public string $summary = '';

    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = $siteUrl . '/tools/preis-rechner';

        SEOMeta::setTitle('Website Kosten Rechner – Preis in 1 Minute');
        SEOMeta::setDescription(
            'Was kostet eine Website oder Software? 5 Fragen beantworten und sofort eine ehrliche Preis-Schätzung erhalten – inkl. kostenlosem Angebot.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Website Kosten Rechner', 'Was kostet eine Website', 'Webdesign Preise Österreich',
            'Software Kosten Rechner', 'Homepage Preis',
        ]);

        OpenGraph::setTitle('Website Kosten Rechner – Preis in 1 Minute | Websters');
        OpenGraph::setDescription('5 Fragen, sofort Preis: Websites, Software & Beratung ehrlich kalkuliert – mit kostenlosem Festpreis-Angebot.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Website Kosten Rechner von Websters']);

        TwitterCard::setTitle('Website Kosten Rechner | Websters');
        TwitterCard::setDescription('Sofort-Preis für Website & Software in 1 Minute.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'WebApplication';
$schema['name'] = 'Website Kosten Rechner von Websters';
$schema['description'] = 'Interaktiver Rechner für Website-, Software- und Beratungskosten mit sofortiger Schätzung.';
$schema['url'] = $pageUrl;
$schema['applicationCategory'] = 'UtilitiesApplication';
$schema['operatingSystem'] = 'Webbrowser';
$schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
$this->pageSchema = $schema;
    }

    public function requestOffer(): void
    {
        $this->name = trim($this->name);
        $this->email = strtolower(trim($this->email));

        $key = 'rechner:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->toast(type: 'error', title: 'Langsam :)', description: 'Bitte kurz warten.', position: 'toast-bottom toast-end', timeout: 3000);

            return;
        }
        RateLimiter::hit($key, 60);

        $this->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email:rfc|max:255',
            'summary' => 'required|string|min:10|max:2000',
        ]);

        try {
            $lead = Lead::create([
                'name' => $this->name,
                'email' => $this->email,
                'company' => 'Preis-Rechner',
                'message' => $this->summary,
            ]);
            try {
                \Illuminate\Support\Facades\Mail::to(config('mail.from.address', 'office@websters.at'))
                    ->send(new \App\Mail\ContactLeadMail($lead));
            } catch (\Throwable $mailErr) {
                report($mailErr);
            }
            $this->toast(type: 'success', title: 'Angebot angefordert!', description: 'Wir melden uns mit deinem Festpreis-Angebot.', position: 'toast-bottom toast-end', timeout: 4000);
            $this->reset(['name', 'email']);
        } catch (\Throwable $err) {
            report($err);
            $this->toast(type: 'error', title: 'Fehler', description: 'Bitte erneut versuchen oder anrufen.', position: 'toast-bottom toast-end', timeout: 3000);
        }
    }
};
?>

<div class="font-poppins" x-data="preisRechner()" x-init="calc()">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white">Gratis Tool</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5">
                Website Kosten Rechner: dein Preis in 1 Minute
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                5 Fragen anklicken – du siehst sofort eine ehrliche Schätzung. Danach fordern wir auf Wunsch dein kostenloses Festpreis-Angebot an.
            </p>
        </div>
    </section>

    <section class="pb-8">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 grid gap-6 lg:grid-cols-[1fr_360px]">
            <div class="space-y-6">
                <!-- 1 TYP -->
                <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                    <div class="font-bold text-brand-dark text-lg">1. Was brauchst du?</div>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2">
                        <template x-for="o in types" :key="o.v">
                            <button type="button" @click="typ = o.v; calc()" :class="typ === o.v ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" class="btn justify-start" x-text="o.l"></button>
                        </template>
                    </div>
                </div>
                <!-- 2 UMFANG -->
                <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                    <div class="font-bold text-brand-dark text-lg">2. Welcher Umfang?</div>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2">
                        <template x-for="o in scopes[typ]" :key="o.v">
                            <button type="button" @click="umfang = o.v; calc()" :class="umfang === o.v ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" class="btn justify-start" x-text="o.l"></button>
                        </template>
                    </div>
                </div>
                <!-- 3 DESIGN -->
                <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                    <div class="font-bold text-brand-dark text-lg">3. Wie individuell soll das Design sein?</div>
                    <div class="mt-3 grid gap-2 sm:grid-cols-3">
                        <template x-for="o in designs" :key="o.v">
                            <button type="button" @click="design = o.v; calc()" :class="design === o.v ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" class="btn justify-start" x-text="o.l"></button>
                        </template>
                    </div>
                </div>
                <!-- 4 EXTRAS -->
                <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                    <div class="font-bold text-brand-dark text-lg">4. Welche Extras?</div>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2">
                        <template x-for="o in extrasList" :key="o.v">
                            <button type="button" @click="toggleExtra(o.v)" :class="extras.includes(o.v) ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" class="btn justify-start text-left" x-text="o.l"></button>
                        </template>
                    </div>
                </div>
                <!-- 5 TEMPO -->
                <div class="rounded-2xl border border-slate-200 bg-white/60 p-5">
                    <div class="font-bold text-brand-dark text-lg">5. Wie eilig ist es?</div>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2">
                        <template x-for="o in tempos" :key="o.v">
                            <button type="button" @click="tempo = o.v; calc()" :class="tempo === o.v ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" class="btn justify-start" x-text="o.l"></button>
                        </template>
                    </div>
                </div>
            </div>

            <!-- ERGEBNIS -->
            <div class="lg:sticky lg:top-6 h-fit rounded-2xl bg-brand-dark text-white p-6">
                <div class="text-sm opacity-70">Deine Schätzung</div>
                <div class="mt-1 text-4xl font-bold" x-text="preisText"></div>
                <div class="mt-2 text-xs opacity-70">Unverbindliche Schätzung inkl. Beratung, Umsetzung & Übergabe.</div>
                <ul class="mt-4 space-y-1 text-sm opacity-90">
                    <template x-for="line in aufschluesselung" :key="line">
                        <li class="flex justify-between gap-2"><span x-text="line[0]"></span><span x-text="line[1]"></span></li>
                    </template>
                </ul>
                <form wire:submit="requestOffer" class="mt-5 space-y-2" @submit="$wire.set('summary', zusammenfassung())">
                    <input type="text" wire:model="name" required maxlength="100" placeholder="Dein Name" class="input input-bordered w-full text-brand-dark">
                    <input type="email" wire:model="email" required maxlength="255" placeholder="E-Mail-Adresse" class="input input-bordered w-full text-brand-dark">
                    <button type="submit" class="btn btn-primary w-full text-white">Kostenloses Angebot anfordern</button>
                </form>
                <a href="tel:+4367763177763" class="btn btn-ghost w-full mt-2 text-white">Oder anrufen: +43 677 63177763</a>
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zum Preis-Rechner</h2>
            @php
                $faqs = [
                    ['q' => 'Wie genau ist die Schätzung?', 'a' => 'Sie liegt erfahrungsgemäß sehr nah am finalen Festpreis: Gleiche Pakete (Starter 990€, Komplett 1.990€, Premium ab 2.990€, Software ab 3.490€) plus ehrliche Aufpreise für Extras. Das kostenlose Angebot danach ist exakt.'],
                    ['q' => 'Was passiert nach „Angebot anfordern"?', 'a' => 'Deine Auswahl landet als Anfrage bei uns. Wir melden uns (meist innerhalb von 24 Stunden) mit deinem Festpreis-Angebot – kostenlos und unverbindlich.'],
                    ['q' => 'Gibt es versteckte Kosten?', 'a' => 'Nein. Hosting, Domain und Wartung weisen wir getrennt aus, alles andere steht im Festpreis.'],
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

<script>
function preisRechner() {
    return {
        typ: 'web',
        umfang: 'starter',
        design: 'individuell',
        extras: [],
        tempo: 'normal',
        preisText: '',
        aufschluesselung: [],
        types: [
            {v: 'web', l: 'Website / Webdesign'},
            {v: 'software', l: 'Software / Web-App'},
            {v: 'consulting', l: 'Beratung & Umsetzung'},
        ],
        scopes: {
            web: [
                {v: 'simple', l: 'Simple OnePager (< 990€)'},
                {v: 'starter', l: 'Starter (990€)'},
                {v: 'komplett', l: 'Komplett (1.990€)'},
                {v: 'premium', l: 'Premium (ab 2.990€)'},
            ],
            software: [
                {v: 'mini', l: 'Mini-Tool (< 990€)'},
                {v: 'basis', l: 'Basis Software (ab 3.490€)'},
                {v: 'business', l: 'Business (individuell)'},
            ],
            consulting: [
                {v: 'check', l: 'Website-Check (149€)'},
                {v: 'projekt', l: 'Beratungsprojekt (Festpreis)'},
            ],
        },
        designs: [
            {v: 'einfach', l: 'Schlicht & sauber (+0€)'},
            {v: 'individuell', l: 'Individuell (+300€)'},
            {v: 'premium', l: 'Premium-Branding (+900€)'},
        ],
        extrasList: [
            {v: 'texte', l: 'Texte schreiben wir (+390€)'},
            {v: 'sprache', l: 'Mehrsprachigkeit (+590€)'},
            {v: 'shop', l: 'Shop / Buchung (+990€)'},
            {v: 'wartung', l: 'Wartungspaket (+29€/Mon.)'},
        ],
        tempos: [
            {v: 'normal', l: 'Normal (+0€)'},
            {v: 'express', l: 'Express (+20%)'},
        ],
        basis() {
            const b = {
                web: {simple: 490, starter: 990, komplett: 1990, premium: 2990},
                software: {mini: 490, basis: 3490, business: 6900},
                consulting: {check: 149, projekt: 1900},
            };
            return (b[this.typ] && b[this.typ][this.umfang]) || 990;
        },
        toggleExtra(v) {
            const i = this.extras.indexOf(v);
            if (i >= 0) this.extras.splice(i, 1); else this.extras.push(v);
            this.calc();
        },
        calc() {
            const valid = (this.scopes[this.typ] || []).map(o => o.v);
            if (!valid.includes(this.umfang)) this.umfang = valid[0];
            let sum = this.basis();
            let lines = [['Basis (' + this.umfang + ')', sum.toLocaleString('de-AT') + '€']];
            const dAdd = {einfach: 0, individuell: 300, premium: 900};
            if (dAdd[this.design] > 0) { sum += dAdd[this.design]; lines.push(['Design', '+' + dAdd[this.design] + '€']); }
            const eAdd = {texte: 390, sprache: 590, shop: 990, wartung: 0};
            const eNames = {texte: 'Texte', sprache: 'Mehrsprachigkeit', shop: 'Shop/Buchung', wartung: 'Wartung'};
            this.extras.forEach(v => {
                if (v === 'wartung') { lines.push(['Wartungspaket', '+29€/Mon.']); return; }
                sum += eAdd[v]; lines.push([eNames[v], '+' + eAdd[v] + '€']);
            });
            if (this.tempo === 'express') {
                const plus = Math.round(sum * 0.2);
                sum += plus; lines.push(['Express', '+' + plus.toLocaleString('de-AT') + '€']);
            }
            const needsQuote = (this.typ === 'software' && this.umfang === 'business') || (this.typ === 'consulting' && this.umfang === 'projekt');
            this.preisText = needsQuote
                ? 'ab ' + sum.toLocaleString('de-AT') + '€'
                : 'ca. ' + sum.toLocaleString('de-AT') + '€';
            this.aufschluesselung = lines;
            if (typeof $wire !== 'undefined') $wire.set('summary', this.zusammenfassung());
        },
        zusammenfassung() {
            const find = (arr, v) => (arr.find(o => o.v === v) || {}).l || v;
            let s = 'Preis-Rechner Anfrage: ' + find(this.types, this.typ) + ' / ' + find(this.scopes[this.typ], this.umfang)
                + ' / Design: ' + find(this.designs, this.design) + ' / Tempo: ' + find(this.tempos, this.tempo)
                + ' / Schätzung: ' + this.preisText;
            if (this.extras.length) s += ' / Extras: ' + this.extras.map(v => find(this.extrasList, v)).join(', ');
            return s;
        },
    };
}
</script>
@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
