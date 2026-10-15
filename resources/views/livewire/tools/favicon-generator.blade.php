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
        $pageUrl = $siteUrl . '/tools/favicon-generator';

        SEOMeta::setTitle('Favicon Generator – Icon gratis erstellen');
        SEOMeta::setDescription(
            'Gratis Favicon-Generator: Emoji oder Buchstabe wählen, Farbe & Form anpassen, als PNG in allen Größen laden – direkt im Browser.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['Favicon Generator', 'Favicon erstellen', 'Website Icon Tool']);

        OpenGraph::setTitle('Favicon Generator – gratis | Websters');
        OpenGraph::setDescription('Favicon aus Emoji/Buchstabe bauen und als PNG laden – gratis.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Favicon Generator von Websters']);

        TwitterCard::setTitle('Favicon Generator | Websters');
        TwitterCard::setDescription('Favicon gratis erstellen.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'WebApplication';
        $schema['name'] = 'Favicon Generator von Websters';
        $schema['description'] = 'Erstellt Favicons aus Emoji oder Buchstaben direkt im Browser.';
        $schema['url'] = $pageUrl;
        $schema['applicationCategory'] = 'UtilitiesApplication';
        $schema['operatingSystem'] = 'Webbrowser';
        $schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="faviconGen()" x-init="draw()">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white">Gratis Tool</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5">
                Favicon Generator: Icon in 30 Sekunden
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                Emoji oder Buchstabe, Farbe, Form – fertig ist das Favicon als PNG in allen Größen. Komplett lokal, gratis.
            </p>
        </div>
    </section>

    <section class="pb-8">
        <div class="max-w-3xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6 grid gap-6 md:grid-cols-[1fr_200px]">
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-semibold text-brand-dark">Zeichen (Emoji oder 1–2 Buchstaben)</label>
                        <input type="text" x-model="char" @input="draw()" maxlength="4" class="input input-bordered w-full mt-1 text-brand-dark text-2xl">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-sm font-semibold text-brand-dark">Hintergrund</label>
                            <input type="color" x-model="bg" @input="draw()" class="w-full h-10 cursor-pointer bg-transparent">
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-brand-dark">Zeichenfarbe</label>
                            <input type="color" x-model="fg" @input="draw()" class="w-full h-10 cursor-pointer bg-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-brand-dark">Form</label>
                        <div class="mt-1 flex gap-2">
                            <template x-for="s in ['rund','eckig','kreis']" :key="s">
                                <button type="button" @click="shape = s; draw()" class="btn btn-xs" :class="shape === s ? 'btn-primary text-white' : 'btn-ghost border border-slate-300'" x-text="s"></button>
                            </template>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" @click="dl(180)" class="btn btn-sm btn-primary text-white">180px laden</button>
                        <button type="button" @click="dl(32)" class="btn btn-sm btn-neutral text-white">32px</button>
                        <button type="button" @click="dl(16)" class="btn btn-sm btn-neutral text-white">16px</button>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <canvas id="fav-canvas" width="180" height="180" class="rounded-xl border border-slate-200"></canvas>
                    <div class="flex items-end gap-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2">
                        <canvas id="fav-32" width="32" height="32"></canvas>
                        <canvas id="fav-16" width="16" height="16"></canvas>
                    </div>
                    <p class="text-xs text-slate-500 text-center">Vorschau: groß, Tab-Größe & Mini</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zum Favicon</h2>
            @php
                $faqs = [
                    ['q' => 'Welche Größen brauche ich?', 'a' => '16px (Browser-Tab), 32px (Retina-Tabs, Lesezeichen) und 180px (Apple-Touch-Icon für Homescreen). Alle drei lädst du hier mit einem Klick – Dateinamen: favicon-16/32.png, apple-touch-icon.png.'],
                    ['q' => 'Wo binde ich das Favicon ein?', 'a' => 'Im <head> deiner Seite: favicon.png als Icon verlinken, apple-touch-icon für iOS. Bei uns ist das Standard – bei fremden Websites einfach die Dateien ins Root-Verzeichnis legen.'],
                    ['q' => 'Emoji oder Buchstabe?', 'a' => 'Emoji sind sofort erkennbar und brauchen kein Design – ideal für Tools, Blogs und Aktionen. Buchstaben (Firmen-Initialen) wirken seriöser für Kanzleien, Praxen und B2B.'],
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
function faviconGen() {
    return {
        char: '🚀', bg: '#002a42', fg: '#ffffff', shape: 'rund',
        paint(canvas, size) {
            const ctx = canvas.getContext('2d');
            canvas.width = canvas.height = size;
            const r = this.shape === 'kreis' ? size / 2 : (this.shape === 'rund' ? size * 0.22 : 0);
            ctx.fillStyle = this.bg;
            ctx.beginPath();
            ctx.roundRect(0, 0, size, size, r);
            ctx.fill();
            const ch = (this.char || 'W').trim().slice(0, 2) || 'W';
            ctx.fillStyle = this.fg;
            ctx.font = `${Math.floor(size * 0.58)}px sans-serif`;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(ch, size / 2, size * 0.55);
        },
        draw() {
            this.paint(document.getElementById('fav-canvas'), 180);
            const p32 = document.getElementById('fav-32');
            const p16 = document.getElementById('fav-16');
            if (p32) this.paint(p32, 32);
            if (p16) this.paint(p16, 16);
        },
        dl(size) {
            const c = document.createElement('canvas');
            this.paint(c, size);
            const a = document.createElement('a');
            a.download = size === 180 ? 'apple-touch-icon.png' : `favicon-${size}.png`;
            a.href = c.toDataURL('image/png');
            a.click();
        },
    };
}
</script>
