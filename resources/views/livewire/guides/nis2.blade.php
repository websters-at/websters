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
        $pageUrl = $siteUrl . '/ratgeber/nis2-oesterreich-kmu';

        SEOMeta::setTitle('NIS2 Österreich: Bin ich betroffen? (KMU-Check)');
        SEOMeta::setDescription(
            'NIS2/NISG in Österreich einfach erklärt: Schwellen (50 Mitarbeiter, 10 Mio. €), Pflichten, Fristen und was KMU jetzt tun sollten – inkl. Selbstcheck.'
        );
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'NIS2 Österreich', 'NISG Betroffenheit', 'NIS2 KMU', 'NIS2 Schwellenwerte',
            'NIS2 Pflichten', 'CERT.at Registrierung',
        ]);

        OpenGraph::setTitle('NIS2 Österreich: Bin ich betroffen? | Websters');
        OpenGraph::setDescription('Schwellen, Pflichten, Fristen: Der NIS2-KMU-Check in 3 Minuten gelesen.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('article');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', ['width' => 1200, 'height' => 630, 'alt' => 'NIS2 Österreich KMU-Check']);

        TwitterCard::setTitle('NIS2-Check für KMU | Websters');
        TwitterCard::setDescription('Bin ich von NIS2 betroffen? Schwellen + Pflichten.');
        TwitterCard::setUrl($pageUrl);
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');

        $schema = ['@context' => 'https://schema.org'];
        $schema['@type'] = 'Article';
        $schema['name'] = 'NIS2 in Österreich: Bin ich als KMU betroffen?';
        $schema['description'] = 'NIS2-Betroffenheit, Schwellenwerte, Pflichten und Maßnahmen für österreichische KMU.';
        $schema['url'] = $pageUrl;
        $schema['author'] = ['@type' => 'Organization', '@id' => 'https://websters.at/#organization'];
        $schema['inLanguage'] = 'de-AT';
        $this->pageSchema = $schema;
    }
};
?>

<div class="font-poppins" x-data="{ show: false }" x-intersect="show = true">
    <section class="relative pt-24 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.2] z-[-1]" style="background-image:linear-gradient(#4bc8e7 1px, transparent 1px),linear-gradient(90deg, #4bc8e7 1px, transparent 1px);background-size:50px 50px;"></div>
        <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start">
            <div class="inline-flex items-center rounded-full badge badge-secondary badge-lg px-3 py-1.5 text-xs sm:text-sm text-white fade-up" :class="{ 'show': show }">Ratgeber</div>
            <h1 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold text-transparent lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up" :class="{ 'show': show }" style="transition-delay:.1s">
                NIS2 in Österreich: Bin ich als KMU betroffen?
            </h1>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up" :class="{ 'show': show }" style="transition-delay:.2s">
                Schwellen, Pflichten, Fristen – und was Lieferanten betrifft: Der 3-Minuten-Check für österreichische KMU. (Stand 2026, keine Rechtsberatung.)
            </p>
        </div>
    </section>

    <article class="pb-8">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 grid gap-8 lg:grid-cols-[1fr_340px]">
            <div class="space-y-8">
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Kurzantwort: unter 50 Mitarbeitern meist nein – aber …</h2>
                    <p class="mt-3 text-sm lg:text-base text-slate-600">NIS2 (in Österreich: NISG) gilt als Faustregel ab <strong>50 Mitarbeitern</strong> oder über <strong>10 Mio. € Umsatz <em>und</em> Bilanzsumme</strong> – und nur in 18 regulierten Sektoren (Energie, Gesundheit, Verkehr, digitale Infrastruktur, IT-Dienste u.&nbsp;a.). Kleinst- und Kleinunternehmen darunter sind <strong>grundsätzlich ausgenommen</strong>. Aber: Großkunden wälzen Pflichten per Vertrag auf Lieferanten ab (<strong>Lieferkettendruck</strong>) – dann brauchst du Nachweise, obwohl das Gesetz dich nicht direkt trifft.</p>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Die Schwellen im Überblick</h2>
                    <div class="mt-4 overflow-x-auto rounded-2xl border border-slate-200">
                        <table class="w-full text-sm">
                            <thead><tr class="bg-slate-50 text-left text-brand-dark"><th class="p-3">Größe</th><th class="p-3">Mitarbeiter</th><th class="p-3">Finanzen</th><th class="p-3">NIS2-Folge</th></tr></thead>
                            <tbody class="text-slate-600">
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Kleinst/Klein</td><td class="p-3">&lt; 50</td><td class="p-3">≤ 10 Mio. €</td><td class="p-3">Grundsätzlich ausgenommen (Ausnahmen: Telekom, DNS/TLD, Vertrauensdienste)</td></tr>
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Mittel</td><td class="p-3">≥ 50</td><td class="p-3">Umsatz <em>und</em> Bilanz &gt; 10 Mio. €</td><td class="p-3">Betroffen → meist „wichtige Einrichtung"</td></tr>
                                <tr class="border-t border-slate-100"><td class="p-3 font-semibold">Groß</td><td class="p-3">≥ 250</td><td class="p-3">Umsatz &gt; 50 Mio. € <em>und</em> Bilanz &gt; 43 Mio. €</td><td class="p-3">Betroffen → meist „wesentliche Einrichtung"</td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Pflichten für Betroffene (Überblick)</h2>
                    <div class="mt-4 grid gap-3 sm:grid-cols-2">
                        @foreach([
                            ['Registrierung', 'Binnen 3 Monaten beim BMI über CERT.at registrieren.'],
                            ['Meldung', 'Cybervorfälle: 24-h-Frühwarnung, 72-h-Meldung, 1-Monats-Bericht.'],
                            ['Risikomanagement', 'Technische + organisatorische Maßnahmen, dokumentiert und wirksam.'],
                            ['Geschäftsführung', 'Leitung genehmigt, überwacht und schult sich – persönliche Haftung bei Pflichtverletzung.'],
                        ] as [$t, $d])
                            <div class="rounded-2xl border border-slate-200 bg-white/60 p-4">
                                <div class="font-semibold text-brand-dark">{{ $t }}</div>
                                <p class="mt-1 text-sm text-neutral-600">{{ $d }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section>
                    <h2 class="text-2xl lg:text-3xl font-bold text-brand-dark">Was KMU jetzt konkret tun sollten</h2>
                    <ul class="mt-3 space-y-2 text-sm lg:text-base text-slate-600">
                        <li>✓ <strong>Betroffenheit prüfen:</strong> Sektor + Größe abgleichen (Tabelle oben). Im Zweifel CERT.at-Anlaufstelle fragen.</li>
                        <li>✓ <strong>Basis-Hygiene dokumentieren:</strong> Backups (getestet!), Updates, Zugriffskonzepte, Incident-Ablauf auf einer Seite.</li>
                        <li>✓ <strong>Lieferanten-Ordner anlegen:</strong> AV-Verträge, TOMs, Subdienstleister-Liste – das fragen regulierte Kunden zuerst.</li>
                        <li>✓ <strong>Website & Tools härten:</strong> Updates, 2FA überall, Backups, Monitoring – unser <a href="/tools/seo-check" class="underline font-semibold">SEO-Check</a> und <a href="/tools/cookie-check" class="underline font-semibold">Cookie-Check</a> finden die Basics gratis.</li>
                    </ul>
                </section>
            </div>
            <aside class="h-fit rounded-2xl bg-brand-dark text-white p-6 lg:sticky lg:top-6">
                <div class="font-bold text-lg">NIS2-Beratung für KMU</div>
                <p class="mt-2 text-sm opacity-80">Betroffenheits-Check, Maßnahmenplan und technische Umsetzung – Festpreis nach kostenlosem Erstgespräch.</p>
                <a href="/leistungen/consulting" class="btn btn-primary btn-sm mt-4 text-white">Consulting ansehen</a>
                <a href="/kontakt" class="btn btn-ghost btn-sm mt-2 text-white">Erstgespräch vereinbaren</a>
            </aside>
        </div>
    </article>

    <section class="pb-12 lg:pb-16">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-brand-dark">Fragen zu NIS2</h2>
            @php
                $faqs = [
                    ['q' => 'Gilt NIS2 auch für Ein-Personen-Unternehmen?', 'a' => 'Nein, grundsätzlich nicht: Unter 50 Mitarbeitern und unter den Finanzschwellen bist du ausgenommen – außer du bist Telekom-Anbieter, DNS/TLD-Betreiber oder Vertrauensdiensteanbieter. Kunden können trotzdem vertraglich Nachweise verlangen.'],
                    ['q' => 'Was passiert, wenn ich betroffen bin und nichts tue?', 'a' => 'Registrierungs- und Meldepflichten greifen, bei Vorfällen drohen Bußgelder und die Geschäftsführung haftet persönlich. Erster Schritt: Betroffenheit klären, dann Maßnahmen-Roadmap.'],
                    ['q' => 'Was kostet NIS2-Umsetzung für ein KMU?', 'a' => 'Hängt vom Stand ab: Basis-Hygiene (Backups, Updates, 2FA, Doku) ist oft in Tagen machbar. Wir kalkulieren als Festpreis nach kostenlosem Scoping – sprich uns an.'],
                    ['q' => 'Muss ich mich bei CERT.at registrieren?', 'a' => 'Nur wenn du unter das NISG fällst (siehe Schwellen oben) – dann binnen 3 Monaten. Darunter freiwillig möglich, aber nicht Pflicht.'],
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
            <p class="mt-6 text-sm text-slate-500">Auch lesen: <a href="/ratgeber/website-kosten-oesterreich" class="underline font-semibold">Was kostet eine Website?</a> · Hinweis: Keine Rechtsberatung, Stand 2026.</p>
        </div>
    </section>
</div>

@if(!empty($pageSchema))
<script type="application/ld+json">@json($pageSchema)</script>
@endif
