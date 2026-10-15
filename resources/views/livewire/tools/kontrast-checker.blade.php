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
        $pageUrl = $siteUrl . '/tools/kontrast-checker';

        SEOMeta::setTitle('Kontrast Checker – WCAG Farben prüfen');
        SEOMeta::setDescription(
            'Gratis Kontrast-Checker: Text- gegen Hintergrundfarbe prüfen – mit Kontrastwert und WCAG AA/AAA-Urteil für barrierefreies Webdesign.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword(['Kontrast Checker', 'WCAG Kontrast prüfen', 'Barrierefreiheit Farben']);

        OpenGraph::setTitle('Kontrast Checker – WCAG-Test gratis | Websters');
        OpenGraph::setDescription('Farben prüfen: Kontrastwert + AA/AAA-Urteil in Sekunden.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Kontrast Checker von Websters']);

        TwitterCard::setTitle('Kontrast Checker | Websters');
        TwitterCard::setDescription('WCAG-Kontrast gratis prüfen.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'WebApplication';
        $schema['name'] = 'Kontrast Checker von Websters';
        $schema['description'] = 'Prüft Farbkontraste nach WCAG direkt im Browser.';
        $schema['url'] = $pageUrl;
        $schema['applicationCategory'] = 'UtilitiesApplication';
        $schema['operatingSystem'] = 'Webbrowser';
        $schema['offers'] = ['@type' => 'Offer', 'price' => 0, 'priceCurrency' => 'EUR'];
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="contrastChecker()">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5">
                Kontrast Checker: Besteht deine Farbkombi WCAG?
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                Zwei Farben wählen, Urteil sehen: Kontrastwert plus AA/AAA für normalen und großen Text – wichtig für Barrierefreiheit (und in der EU bald Pflicht).
            </p>
        </div>
    </section>

    <section class="pb-8">
        <div class="max-w-3xl mx-auto px-4 xl:px-0">
            <div class="rounded-2xl border border-slate-200 bg-white/60 p-6">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-semibold text-brand-dark">Textfarbe</label>
                        <div class="mt-1 flex items-center gap-2">
                            <input type="color" x-model="fg" class="w-12 h-12 cursor-pointer bg-transparent">
                            <input type="text" x-model="fg" maxlength="7" class="input input-bordered w-full font-mono text-brand-dark">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-brand-dark">Hintergrund</label>
                        <div class="mt-1 flex items-center gap-2">
                            <input type="color" x-model="bg" class="w-12 h-12 cursor-pointer bg-transparent">
                            <input type="text" x-model="bg" maxlength="7" class="input input-bordered w-full font-mono text-brand-dark">
                        </div>
                    </div>
                </div>
                <div class="mt-5 rounded-xl p-5 text-center font-bold text-xl" :style="'background:' + bg + ';color:' + fg">
                    So sieht dein Text aus (Aa)
                </div>
                <div class="mt-4 flex flex-wrap items-center gap-3">
                    <div class="text-3xl font-bold text-brand-dark" x-text="ratio().toFixed(2) + ' : 1'"></div>
                    <span class="badge" :class="passAA() ? 'badge-success text-white' : 'badge-error text-white'" x-text="passAA() ? 'AA bestanden' : 'AA durchgefallen'"></span>
                    <span class="badge" :class="passAAA() ? 'badge-success text-white' : 'badge-error text-white'" x-text="passAAA() ? 'AAA bestanden' : 'AAA durchgefallen'"></span>
                    <span class="badge badge-ghost" x-text="'Großtext AA: ' + (ratio() >= 3 ? 'ja' : 'nein')"></span>
                </div>
                <p class="mt-3 text-sm text-slate-600">Normaler Text braucht ≥ 4,5 (AA) bzw. ≥ 7,0 (AAA), großer Text ≥ 3,0. Unter 4,5: dunkler/heller nachstellen oder Fettschrift + Größe erhöhen.</p>
            </div>
        </div>
    </section>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu Kontrast & Barrierefreiheit</h2>
            @php
                $faqs = [
                    ['q' => 'Was bedeutet WCAG AA?', 'a' => 'Die internationale Richtlinie für barrierefreie Websites: Normaler Text braucht mindestens Kontrast 4,5:1, großer Text 3:1. AA ist der Standard, den Gesetze (in der EU der European Accessibility Act) verlangen.'],
                    ['q' => 'Gilt Barrierefreiheit auch für meine Website?', 'a' => 'Der European Accessibility Act gilt ab 2025 schrittweise auch für viele private Websites, besonders Shops und Dienstleister. Kontraste sind der häufigste und am leichtesten belegbare Verstoß – darum jetzt prüfen.'],
                    ['q' => 'Macht ihr barrierefreie Websites?', 'a' => 'Ja: ausreichende Kontraste, Tastatur-Bedienbarkeit, semantisches HTML und Alt-Texte sind bei unseren Projekten Standard – sprich uns einfach an.'],
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
function contrastChecker() {
    return {
        fg: '#002a42', bg: '#ffffff',
        lum(hex) {
            const c = hex.replace('#', '');
            if (!/^[0-9a-fA-F]{6}$/.test(c)) return null;
            const f = i => {
                const v = parseInt(c.substr(i, 2), 16) / 255;
                return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
            };
            return 0.2126 * f(0) + 0.7152 * f(2) + 0.0722 * f(4);
        },
        ratio() {
            const a = this.lum(this.fg), b = this.lum(this.bg);
            if (a === null || b === null) return 1;
            const [hi, lo] = a >= b ? [a, b] : [b, a];
            return (hi + 0.05) / (lo + 0.05);
        },
        passAA() { return this.ratio() >= 4.5; },
        passAAA() { return this.ratio() >= 7; },
    };
}
</script>
