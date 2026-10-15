<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public function mount(): void
    {
        $siteUrl = 'https://websters.at';
        $pageUrl = $siteUrl . '/tools/passwort-generator';

        SEOMeta::setTitle('Passwort Generator – sichere Passwörter erstellen');
        SEOMeta::setDescription(
            'Gratis Passwort-Generator: starke, zufällige Passwörter direkt im Browser – nichts verlässt dein Gerät. Mit Länge, Zeichen & Stärke-Anzeige.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['Passwort Generator', 'Sicheres Passwort erstellen', 'Passwort Tool']);

        OpenGraph::setTitle('Passwort Generator – stark & gratis | Websters');
        OpenGraph::setDescription('Zufällige sichere Passwörter im Browser erzeugt – 100 % privat.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Passwort Generator von Websters']);

        TwitterCard::setTitle('Passwort Generator | Websters');
        TwitterCard::setDescription('Starke Passwörter, gratis, privat.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'WebApplication';
        $schema['name'] = 'Passwort Generator von Websters';
        $schema['description'] = 'Erzeugt starke zufällige Passwörter lokal im Browser.';
        $schema['url'] = $pageUrl;
        $schema['applicationCategory'] = 'UtilitiesApplication';
        $schema['operatingSystem'] = 'Webbrowser';
        $schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
        $this->pageSchema = $schema;
    }

    public ?array $pageSchema = null;
};
?>

<div class="font-poppins" x-data="pwGen()" x-init="generate()">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5">
                Passwort Generator: stark, zufällig, privat
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                Erzeugt direkt in deinem Browser – kein Server sieht dein Passwort je. Länge und Zeichen frei wählbar.
            </p>
        </div>
    </section>

    <section class="pb-8">
        <div class="max-w-3xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6">
                <div class="flex flex-col sm:flex-row gap-2">
                    <input type="text" readonly :value="pw" onclick="this.select()" class="input input-bordered w-full font-mono text-brand-dark" aria-label="Generiertes Passwort">
                    <button type="button" @click="copy()" class="btn btn-primary text-white whitespace-nowrap" x-text="copied ? 'Kopiert!' : 'Kopieren'"></button>
                </div>
                <div class="mt-4">
                    <label class="text-sm font-semibold text-brand-dark">Länge: <span x-text="len"></span> Zeichen</label>
                    <input type="range" min="8" max="64" x-model.number="len" @input="generate()" class="range range-primary w-full">
                </div>
                <div class="mt-3 grid grid-cols-2 sm:grid-cols-4 gap-2 text-sm">
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" x-model="upper" @change="preset='';generate()" class="checkbox checkbox-primary checkbox-sm" checked> A–Z</label>
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" x-model="lower" @change="preset='';generate()" class="checkbox checkbox-primary checkbox-sm" checked> a–z</label>
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" x-model="digits" @change="preset='';generate()" class="checkbox checkbox-primary checkbox-sm" checked> 0–9</label>
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" x-model="symbols" @change="preset='';generate()" class="checkbox checkbox-primary checkbox-sm" checked> Symbole</label>
                </div>
                <details class="mt-4 rounded-xl border border-slate-200 bg-white/70">
                    <summary class="cursor-pointer px-4 py-3 text-sm font-semibold text-brand-dark">Erweiterte Einstellungen</summary>
                    <div class="px-4 pb-4 space-y-3 text-sm">
                        <div class="flex flex-wrap gap-2">
                            <template x-for="pr in presets" :key="pr.v">
                                <button type="button" @click="applyPreset(pr.v)" class="btn btn-xs" :class="preset === pr.v ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" x-text="pr.l"></button>
                            </template>
                        </div>
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" x-model="noAmbiguous" @change="preset='';generate()" class="checkbox checkbox-primary checkbox-sm mt-0.5" checked>
                            <span>Verwechslungsgefährdete Zeichen ausschließen <span class="font-mono text-slate-500">(0 O 1 l I |)</span></span>
                        </label>
                        <label class="block">
                            <span class="font-semibold text-brand-dark">Eigene Ausschlüsse <span class="font-normal text-slate-500">(z. B. § für Oracle/DB-Systeme)</span></span>
                            <input type="text" x-model="exclude" @input="generate()" maxlength="40" placeholder="z. B. §$%&/" class="input input-bordered input-sm w-full mt-1 font-mono text-brand-dark">
                        </label>
                        <p class="text-xs text-slate-500">Zeichenvorrat: <span class="font-mono" x-text="pool().length + ' Zeichen'"></span> · Sonderwunsch-Systeme (Oracle, alte DBs, Router) verbieten oft §, Leerzeichen oder Quotes – einfach oben eintragen.</p>
                    </div>
                </details>
                <div class="mt-4 flex items-center gap-3">
                    <button type="button" @click="generate()" class="btn btn-neutral text-white">Neu generieren</button>
                    <div class="text-sm text-slate-600">Stärke: <strong x-text="strength"></strong> (~<span x-text="bits"></span> Bit)</div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu sicheren Passwörtern</h2>
            @php
                $faqs = [
                    ['q' => 'Wie lang sollte ein sicheres Passwort sein?', 'a' => 'Mindestens 16 Zeichen für wichtige Konten, 20+ für E-Mail und Passwort-Manager. Länge schlägt Komplexität: Ein langes Passwort aus allen Zeichensätzen ist praktisch unknackbar.'],
                    ['q' => 'Sieht Websters mein generiertes Passwort?', 'a' => 'Nein. Die Erzeugung läuft per Zufallsgenerator (crypto.getRandomValues) direkt in deinem Browser. Es wird nichts übertragen, gespeichert oder protokolliert.'],
                    ['q' => 'Wo speichere ich Passwörter am besten?', 'a' => 'In einem Passwort-Manager (z. B. Bitwarden, 1Password, KeePass). Ein starkes Master-Passwort merken, den Rest generieren lassen – genau wie mit diesem Tool.'],
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
function pwGen() {
    return {
        pw: '', len: 20, upper: true, lower: true, digits: true, symbols: true,
        noAmbiguous: true, exclude: '', preset: 'max',
        copied: false, strength: '', bits: 0,
        presets: [
            {v: 'max', l: 'Maximal'},
            {v: 'balanced', l: 'Ausgewogen'},
            {v: 'oracle', l: 'Oracle & DB-sicher'},
            {v: 'pin', l: 'PIN'},
            {v: 'readable', l: 'Gut lesbar'},
        ],
        applyPreset(v) {
            this.preset = v;
            if (v === 'max') { this.len = 24; this.upper = this.lower = this.digits = this.symbols = true; this.noAmbiguous = true; this.exclude = ''; }
            if (v === 'balanced') { this.len = 16; this.upper = this.lower = this.digits = true; this.symbols = false; this.noAmbiguous = true; this.exclude = ''; }
            if (v === 'oracle') { this.len = 16; this.upper = this.lower = this.digits = true; this.symbols = false; this.noAmbiguous = true; this.exclude = '§ $%&/\'"`'; }
            if (v === 'pin') { this.len = 6; this.upper = this.lower = this.symbols = false; this.digits = true; this.noAmbiguous = false; this.exclude = ''; }
            if (v === 'readable') { this.len = 18; this.upper = this.lower = true; this.digits = this.symbols = false; this.noAmbiguous = true; this.exclude = ''; }
            this.generate();
        },
        pool() {
            let p = '';
            if (this.upper) p += 'ABCDEFGHJKLMNPQRSTUVWXYZ';
            if (this.lower) p += 'abcdefghijkmnopqrstuvwxyz';
            if (this.digits) p += '23456789';
            if (this.symbols) p += '!@#$%^&*-_+=?';
            if (this.noAmbiguous) p = p.replace(/[0O1lI|]/g, '');
            if (this.exclude) {
                const ban = new Set(this.exclude.split(''));
                p = [...p].filter(c => !ban.has(c)).join('');
            }
            return p || 'x';
        },
        generate() {
            this.copied = false;
            const pool = this.pool();
            const buf = new Uint32Array(this.len);
            crypto.getRandomValues(buf);
            let out = '';
            for (let i = 0; i < this.len; i++) out += pool[buf[i] % pool.length];
            this.pw = out;
            this.bits = Math.round(this.len * Math.log2(pool.length));
            this.strength = this.bits >= 100 ? 'sehr stark' : (this.bits >= 70 ? 'stark' : (this.bits >= 50 ? 'okay' : 'schwach'));
        },
        copy() {
            navigator.clipboard.writeText(this.pw).then(() => { this.copied = true; });
        },
    };
}
</script>
