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
        $pageUrl = $siteUrl . '/tools';

        SEOMeta::setTitle('Gratis Tools – Domain-Check, SEO & Sicherheit');
        SEOMeta::setDescription(
            '7 kostenlose Websters-Tools: Domain-Check, SEO-Check, Cookie-Check, Passwort-Generator, UTM-Builder & Kontrast-Checker. Ohne Anmeldung, sofort nutzbar.'
        );
        SEOMeta::addKeyword(['Websters Tools', 'Domain Check', 'SEO Check gratis', 'Cookie Check', 'Gratis Online Tools']);

        OpenGraph::setTitle('Gratis Tools von Websters');
        OpenGraph::setDescription('Domain, SEO, Cookies, Passwörter, UTM-Links & Farben prüfen – kostenlos und ohne Anmeldung.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'Gratis Tools von Websters']);

        TwitterCard::setTitle('Gratis Tools | Websters');
        TwitterCard::setDescription('7 Gratis-Tools für Web-Erfolg.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

$schema = ['@context' => 'https://schema.org'];
$schema['@type'] = 'CollectionPage';
$schema['name'] = 'Gratis Tools von Websters';
$schema['description'] = 'Übersicht aller kostenlosen Websters-Tools.';
$schema['url'] = $pageUrl;
$this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 lg:mt-9 lg:leading-tight fade-up" :class="{ 'show': show }">
                Gratis Tools für deinen Web-Erfolg
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.15s">
                Ohne Anmeldung, sofort nutzbar.
            </p>
        </div>
    </section>

    @php
        $groups = [
            ['t' => 'Domain & Start', 'd' => 'Der Anfang von allem: Name sichern, Kosten kennen.', 'tools' => [
                ['u' => '/tools/domain-check', 'b' => 'Beliebt', 't' => 'Domain-Check', 'd' => 'Ist deine Wunsch-Domain (.at, .com, .de, .org, .net) noch frei? Live prüfen inkl. Alternativen – danach direkt anrufen oder mailen.', 'c' => 'Jetzt prüfen', 'i' => 'M12 21s-7-5.5-7-11a7 7 0 0 1 14 0c0 5.5-7 11-7 11z M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0-4 0'],
            ]],
            ['t' => 'SEO & Marketing', 'd' => 'Sichtbarkeit messen, Tracking sauber aufsetzen.', 'tools' => [
                ['u' => '/tools/seo-check', 'b' => null, 't' => 'SEO Check', 'd' => '11 SEO-Faktoren in Sekunden geprüft: Title, H1, Bilder, Speed & mehr – mit Punktestand und Tipps.', 'c' => 'Website testen', 'i' => 'M3 11l18-8-8 18-2-8-8-2z'],
                ['u' => '/tools/utm-builder', 'b' => null, 't' => 'UTM Builder', 'd' => 'Saubere Tracking-Links für Newsletter & Ads in Sekunden bauen und kopieren.', 'c' => 'Link bauen', 'i' => 'M10 13a5 5 0 0 0 7.5.5l3-3a5 5 0 0 0-7-7l-1.7 1.7 M14 11a5 5 0 0 0-7.5-.5l-3 3a5 5 0 0 0 7 7l1.7-1.7'],
            ]],
            ['t' => 'Sicherheit & Design', 'd' => 'DSGVO, Passwörter, Barrierefreiheit.', 'tools' => [
                ['u' => '/tools/cookie-check', 'b' => null, 't' => 'Cookie Check', 'd' => 'Welche Tracker und Drittanbieter lädt deine Website? Inventur in Sekunden mit DSGVO-Einschätzung.', 'c' => 'Tracker finden', 'i' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
                ['u' => '/tools/passwort-generator', 'b' => null, 't' => 'Passwort Generator', 'd' => 'Starke Zufalls-Passwörter direkt im Browser – mit Stärke-Anzeige und Oracle-Safe-Modus.', 'c' => 'Passwort erstellen', 'i' => 'M4 8h16v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z M8 8V6a4 4 0 0 1 8 0v2 M12 13v3'],
                ['u' => '/tools/kontrast-checker', 'b' => null, 't' => 'Kontrast Checker', 'd' => 'Farben auf WCAG-Kontrast prüfen – mit AA/AAA-Urteil für barrierefreies Design.', 'c' => 'Kontrast testen', 'i' => 'M12 3v3 M12 18v3 M3 12h3 M18 12h3 M5.6 5.6l2.1 2.1 M16.3 16.3l2.1 2.1 M18.4 5.6l-2.1 2.1 M7.7 16.3l-2.1 2.1 M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0z'],
            ]],
            ['t' => 'Medien & Assets', 'd' => 'QR-Codes und Favicons in Sekunden selbst machen.', 'tools' => [
                ['u' => '/tools/qr-generator', 'b' => 'Neu', 't' => 'QR Generator', 'd' => 'QR-Codes für Links und Texte erstellen – lokal im Browser, mit PNG- und SVG-Download.', 'c' => 'QR erstellen', 'i' => 'M4 4h5v5H4z M15 4h5v5h-5z M4 15h5v5H4z M15 15h2v2h-2z M19 15h1v1h-1z M15 19h1v1h-1z M19 19h1v1h-1z M17 17h2v2h-2z'],
                ['u' => '/tools/favicon-generator', 'b' => 'Neu', 't' => 'Favicon Generator', 'd' => 'Favicon aus Emoji oder Buchstabe bauen – als PNG in allen Größen laden.', 'c' => 'Favicon bauen', 'i' => 'M12 2l2.4 4.9 5.4.8-3.9 3.8.9 5.4-4.8-2.5-4.8 2.5.9-5.4L4.2 7.7l5.4-.8z'],
            ]],
        ];
    @endphp

    @foreach($groups as $gi => $group)
        <section class="pb-10">
            <div class="max-w-7xl mx-auto px-4 xl:px-0">
                <h2 class="text-xl lg:text-2xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">{{ $group['t'] }}</h2>
                <p class="mt-1 text-sm text-slate-500 fade-up" :class="{ 'show': show }">{{ $group['d'] }}</p>
                <div class="mt-4 grid gap-4 md:grid-cols-2 {{ count($group['tools']) > 2 ? 'lg:grid-cols-3' : '' }}">
                    @foreach($group['tools'] as $ti => $tool)
                        <a href="{{ $tool['u'] }}" wire:navigate class="group rounded-2xl border border-slate-200 bg-white/60 p-6 hover:border-brand-dark hover:shadow-xl hover:-translate-y-1 transition-all duration-300 fade-up" :class="{ 'show': show }" style="transition-delay:.{{ 5 + $gi * 10 + $ti * 5 }}s">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-dark/5 text-brand-dark group-hover:bg-brand-dark group-hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-6 w-6"><path d="{{ $tool['i'] }}"/></svg>
                                </div>
                                @if($tool['b'])<div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1 text-xs text-white">{{ $tool['b'] }}</div>@endif
                            </div>
                            <div class="mt-4 font-bold text-brand-dark text-xl">{{ $tool['t'] }} <span class="inline-block transition-transform group-hover:translate-x-1">→</span></div>
                            <p class="mt-2 text-sm text-neutral-600">{{ $tool['d'] }}</p>
                            <span class="btn btn-sm btn-primary mt-4 text-white">{{ $tool['c'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark fade-up" :class="{ 'show': show }">Fragen zu den Tools</h2>
            @php
                $faqs = [
                    ['q' => 'Muss ich mich anmelden?', 'a' => 'Nein. Alle Tools funktionieren sofort ohne Konto. Serverseitige Prüfungen (Domain, SEO, Cookies) laufen auf unserer Infrastruktur in Österreich, alles andere direkt in deinem Browser.'],
                    ['q' => 'Werden meine Eingaben gespeichert?', 'a' => 'Nein. Domain-, URL- und Farbeingaben werden nur für die Prüfung verwendet und nicht gespeichert. Passwörter verlassen dein Gerät grundsätzlich nie.'],
                    ['q' => 'Kann ich ein Tool für meine Website vorschlagen?', 'a' => 'Gerne – ruf an oder schreib uns. Wenn es vielen hilft, bauen wir es.'],
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
