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
        $pageUrl = $siteUrl . '/tools/qr-generator';

        SEOMeta::setTitle('QR Code Generator – gratis QR erstellen');
        SEOMeta::setDescription(
            'Gratis QR-Code-Generator: Links, Texte & WLAN-Daten in QR-Codes verwandeln – lokal im Browser, mit PNG/SVG-Download.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['QR Code Generator', 'QR erstellen gratis', 'QR Code Tool']);

        OpenGraph::setTitle('QR Code Generator – gratis | Websters');
        OpenGraph::setDescription('QR-Codes lokal erstellen und als PNG/SVG laden – gratis.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'QR Code Generator von Websters']);

        TwitterCard::setTitle('QR Generator | Websters');
        TwitterCard::setDescription('QR-Codes gratis erstellen.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'WebApplication';
        $schema['name'] = 'QR Code Generator von Websters';
        $schema['description'] = 'Erstellt QR-Codes lokal im Browser mit Download.';
        $schema['url'] = $pageUrl;
        $schema['applicationCategory'] = 'UtilitiesApplication';
        $schema['operatingSystem'] = 'Webbrowser';
        $schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="qrGen()" x-init="render()">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white">Gratis Tool</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5">
                QR Code Generator: Link rein, Code raus
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                QR-Codes für Links, Texte oder WLAN-Daten – komplett lokal, mit PNG- und SVG-Download.
            </p>
            <p class="mt-2 text-xs text-slate-500">QR-Bibliothek: qrcode-generator (MIT, Kazuhiko Arase), lokal eingebunden.</p>
        </div>
    </section>

    <section class="pb-8">
        <div class="max-w-3xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6 grid gap-6 md:grid-cols-[1fr_240px]">
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-semibold text-brand-dark">Inhalt *</label>
                        <textarea x-model="text" @input="render()" rows="3" placeholder="https://deine-seite.at oder beliebiger Text" class="textarea textarea-bordered w-full mt-1 text-brand-dark"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-sm font-semibold text-brand-dark">Farbe</label>
                            <input type="color" x-model="fg" @input="render()" class="w-full h-10 cursor-pointer bg-transparent">
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-brand-dark">Hintergrund</label>
                            <input type="color" x-model="bg" @input="render()" class="w-full h-10 cursor-pointer bg-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-brand-dark">Fehlerkorrektur</label>
                        <select x-model="level" @change="render()" class="select select-bordered w-full mt-1 text-brand-dark">
                            <option value="L">L – kleinster Code</option>
                            <option value="M">M – Standard</option>
                            <option value="Q">Q – robust (Logo-Platz)</option>
                            <option value="H">H – maximal robust</option>
                        </select>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" @click="downloadPng()" class="btn btn-sm btn-primary text-white">PNG laden</button>
                        <button type="button" @click="downloadSvg()" class="btn btn-sm btn-neutral text-white">SVG laden</button>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-start gap-2">
                    <canvas id="qr-canvas" width="216" height="216" class="rounded-xl border border-slate-200 bg-white"></canvas>
                    <p class="text-xs text-slate-500 text-center">Vorschau · scannbar testen!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu QR-Codes</h2>
            @php
                $faqs = [
                    ['q' => 'Laufen QR-Codes ab?', 'a' => 'Nein – statische QR-Codes wie diese hier gelten für immer, solange der Inhalt (z. B. die URL) existiert. Nur dynamische Codes kostenpflichtiger Anbieter können ablaufen.'],
                    ['q' => 'Sieht Websters meine Inhalte?', 'a' => 'Nein. Der Code entsteht per Bibliothek direkt in deinem Browser. Nichts wird übertragen oder gespeichert.'],
                    ['q' => 'Welche Fehlerkorrektur soll ich wählen?', 'a' => 'M für normal, Q/H wenn du ein Logo in die Mitte legen oder den Code klein/verwittert drucken willst. Höher = dichteres Muster.'],
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

<script src="/js/vendor/qrcode-generator.min.js" defer></script>
<script>
function qrGen() {
    return {
        text: 'https://websters.at', fg: '#002a42', bg: '#ffffff', level: 'M',
        _tries: 0,
        matrix() {
            if (typeof qrcode === 'undefined') return null;
            const t = (this.text || '').trim() || 'https://websters.at';
            try {
                const qr = qrcode(0, this.level);
                qr.addData(t);
                qr.make();
                return qr;
            } catch (e) { return 'overflow'; }
        },
        draw(canvas, size) {
            const qr = this.matrix();
            if (qr === 'overflow') return false;
            const n = qr.getModuleCount();
            const ctx = canvas.getContext('2d');
            const s = size / n;
            canvas.width = canvas.height = size;
            ctx.fillStyle = this.bg;
            ctx.fillRect(0, 0, size, size);
            ctx.fillStyle = this.fg;
            for (let r = 0; r < n; r++)
                for (let c = 0; c < n; c++)
                    if (qr.isDark(r, c)) ctx.fillRect(Math.floor(c * s), Math.floor(r * s), Math.ceil(s), Math.ceil(s));
            return true;
        },
        render() {
            if (typeof qrcode === 'undefined') {
                if (this._tries++ < 25) setTimeout(() => this.render(), 200);
                return;
            }
            const canvas = document.getElementById('qr-canvas');
            if (!canvas) return;
            if (!this.draw(canvas, 216)) {
                const ctx = canvas.getContext('2d');
                ctx.fillStyle = '#fff';
                ctx.fillRect(0, 0, 216, 216);
                ctx.fillStyle = '#c00';
                ctx.font = '13px sans-serif';
                ctx.fillText('Zu viel Text – kürzen!', 20, 110);
            }
        },
        downloadPng() {
            const c = document.createElement('canvas');
            if (!this.draw(c, 1024)) return;
            const a = document.createElement('a');
            a.download = 'qr-code.png';
            a.href = c.toDataURL('image/png');
            a.click();
        },
        downloadSvg() {
            const qr = this.matrix();
            if (!qr || qr === 'overflow') return;
            const n = qr.getModuleCount();
            let rects = '';
            for (let r = 0; r < n; r++)
                for (let c = 0; c < n; c++)
                    if (qr.isDark(r, c)) rects += `<rect x="${c}" y="${r}" width="1" height="1"/>`;
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${n} ${n}"><rect width="${n}" height="${n}" fill="${this.bg}"/><g fill="${this.fg}">${rects}</g></svg>`;
            const a = document.createElement('a');
            a.download = 'qr-code.svg';
            a.href = 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg);
            a.click();
        },
    };
}
</script>
