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
        $pageUrl = $siteUrl . '/imprint';

        // --- SEO Meta ---
        SEOMeta::setTitle('Impressum & Rechtliche Hinweise | Webagentur Websters Linz');
        SEOMeta::setDescription('Impressum der Webagentur Websters: Adresse Auwiesenstraße 95, 4030 Linz. Rechtliche Informationen gemäß §5 ECG, §25 MedienG und österreichischem Unternehmensgesetz.');
        SEOMeta::setCanonical($pageUrl);
        SEOMeta::addKeyword([
            'Impressum Webagentur Linz',
            'Rechtliche Informationen Webdesign',
            'Datenschutzerklärung Webseite',
            'AGB Webentwicklung',
            'Haftungsausschluss Österreich',
            'Urheberrecht Webseiten',
            'Offenlegung gemäß ECG',
            'MedienG Information',
            'Gewerbeordnung Österreich',
            'Unternehmensdaten Websters'
        ]);

        // --- OpenGraph / Social ---
        OpenGraph::setTitle('Impressum | Webagentur Websters Linz');
        OpenGraph::setDescription('Rechtliche Informationen und Offenlegung der Webagentur Websters gemäß österreichischem Recht.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Impressum der Webagentur Websters'
        ]);

        // --- Twitter Card ---
        TwitterCard::setTitle('Impressum | Webagentur Websters');
        TwitterCard::setDescription('Rechtliche Informationen und Offenlegung der Webagentur Websters.');
        TwitterCard::setImage($siteUrl . '/assets/websters-full-logo.png');
        TwitterCard::setSite('@WebstersAgency');

        // --- JSON-LD (LegalService für Impressum) ---
        JsonLd::setType('LegalService');
        JsonLd::setTitle('Impressum der Webagentur Websters');
        JsonLd::setDescription('Rechtliche Informationen und Offenlegung gemäß österreichischem Recht.');
        JsonLd::setUrl($pageUrl);

        // WICHTIG: Korrekte Adresse aus dem Impressum übernehmen!
        JsonLd::addValues([
            'name' => 'Webagentur Websters',
            'description' => 'Webagentur für Webdesign, Individualsoftware und IT-Consulting',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/images/logo-jsonld.jpg',
            // ACHTUNG: Andere Adresse als auf der Kontaktseite!
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Auwiesenstraße 95',
                'addressLocality' => 'Linz',
                'postalCode' => '4030',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => ['German'],
                'telephone' => '+43660466179', // WICHTIG: Andere Nummer als auf Kontaktseite!
                'email' => 'office@websters.at',
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],
            'founder' => [
                '@type' => 'Person',
                'name' => 'Stevan Vlajic'
            ],
            'foundingDate' => '2024',
            'legalName' => 'Stevan Vlajic',
            // Falls vorhanden, hinzufügen:
            // 'vatID' => 'ATU12345678',
            // 'taxID' => '123456789',
            'knowsAbout' => [
                'Webdesign',
                'Software Development',
                'IT Consulting',
                'Digital Transformation'
            ]
        ]);
    }
};
?>
<section
    class="mt-32 lg:mt-16 mb-8 lg:mb-4 lg:pt-20 relative"
    id="impressum"
    x-data="{ show: false }"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <div class="flex flex-col gap-y-8 md:px-4 lg:px-8">

            <!-- Header -->
            <div
                class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.1s"
            >
                <div
                    class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.2s"
                >
                    Impressum
                </div>

                <div
                    class="mt-6 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-2xl font-poppins font-bold text-transparent lg:text-4xl lg:leading-tight lg:mt-8 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.3s"
                >
                    Rechtliche Informationen & Offenlegung
                </div>

                <p
                    class="mt-4 text-sm font-poppins text-slate-600 sm:w-4/5 lg:w-3/5 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.35s"
                >
                    Informationen und Offenlegung gemäß §5 (1) ECG, § 25 MedienG, § 63 GewO und § 14 UGB.
                </p>
            </div>

            <!-- Content -->
            <div class="grid gap-6 lg:grid-cols-2 lg:items-start lg:gap-8">

                <!-- Left column -->
                <div class="space-y-4">

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.4s"
                    >
                        <div class="p-5 sm:p-6">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase mb-3">
                                Webseitenbetreiber
                            </h3>
                            <dl class="text-sm font-poppins text-slate-600 space-y-1.5">
                                <div>
                                    <dt class="font-medium text-slate-700">Webseitenbetreiber:</dt>
                                    <dd>Stevan Vlajic</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">Geschäftsführer:</dt>
                                    <dd>Stevan Vlajic</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">Anschrift:</dt>
                                    <dd>Auwiesenstraße 95, 4030 Linz</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">Gewerbeaufsichtbehörde:</dt>
                                    <dd>Magistrat der Stadt Linz</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.45s"
                    >
                        <div class="p-5 sm:p-6">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase mb-3">
                                Kontaktdaten
                            </h3>
                            <dl class="text-sm font-poppins text-slate-600 space-y-1.5">
                                <div>
                                    <dt class="font-medium text-slate-700">Telefon:</dt>
                                    <dd>+43660466179</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">E-Mail:</dt>
                                    <dd>
                                        <a href="mailto:office@websters.at" class="underline underline-offset-2 hover:text-primary transition">
                                            office@websters.at
                                        </a>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.5s"
                    >
                        <div class="p-5 sm:p-6">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase mb-3">
                                Anwendbare Rechtsvorschriften
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Anwendbare Rechtsvorschriften sind unter folgendem Link abrufbar:
                                <a href="https://www.ris.bka.gv.at" target="_blank" rel="noopener noreferrer"
                                   class="underline underline-offset-2 hover:text-primary transition">
                                    www.ris.bka.gv.at
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right column -->
                <div class="space-y-4">

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.55s"
                    >
                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase">
                                Online-Streitbeilegung
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Verbraucher, welche in Österreich oder in einem sonstigen Vertragsstaat der ODR-VO
                                niedergelassen sind, haben die Möglichkeit, Probleme bezüglich dem entgeltlichen Kauf
                                von Waren oder Dienstleistungen im Rahmen einer Online-Streitbeilegung (nach OS, AStG)
                                zu lösen. Die Europäische Kommission stellt eine Plattform hierfür bereit:
                                <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer"
                                   class="underline underline-offset-2 hover:text-primary transition">
                                    https://ec.europa.eu/consumers/odr
                                </a>
                            </p>
                        </div>
                    </div>

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.6s"
                    >
                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase">
                                Urheberrecht
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Die Inhalte dieser Webseite unterliegen, soweit dies rechtlich möglich ist, diversen
                                Schutzrechten (z.&nbsp;B. dem Urheberrecht). Jegliche Verwendung oder Verbreitung von
                                bereitgestelltem Material, welche urheberrechtlich untersagt ist, bedarf der
                                schriftlichen Zustimmung des Webseitenbetreibers.
                            </p>
                        </div>
                    </div>

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.65s"
                    >
                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase">
                                Haftungsausschluss
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Trotz sorgfältiger inhaltlicher Kontrolle übernimmt der Webseitenbetreiber keine Haftung
                                für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich
                                deren Betreiber verantwortlich. Sollten Sie dennoch auf ausgehende Links aufmerksam
                                werden, welche auf eine Webseite mit rechtswidriger Tätigkeit oder Information verweisen,
                                ersuchen wir um einen dementsprechenden Hinweis, um diese nach § 17 Abs. 2 ECG
                                umgehend zu entfernen.
                            </p>
                            <p class="text-sm font-poppins text-slate-600">
                                Die Urheberrechte Dritter werden vom Betreiber dieser Webseite mit größter Sorgfalt
                                beachtet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden,
                                bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden derartiger Rechtsverletzungen
                                werden wir den betroffenen Inhalt umgehend entfernen.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
