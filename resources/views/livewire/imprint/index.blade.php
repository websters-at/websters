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
        $pageUrl = route('imprint');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        | Kürzere Titel → kein Abschneiden in Google.
        */

        SEOMeta::setTitle('Impressum');
        SEOMeta::setDescription(
            'Impressum von Websters e.U.: Libellenweg 13, 4209 Engerwitzdorf. IT-Dienstleistung, Webdesign, Softwareentwicklung, Medienproduktion. Rechtliche Informationen gemäß §5 ECG, §25 MedienG und österreichischem Unternehmensgesetz.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'Impressum Websters e.U.',
            'Rechtliche Hinweise Webdesign',
            'Offenlegung gemäß ECG',
            'Mediengesetz Österreich',
            'Webdesign Unternehmen rechtliche Informationen',
            'Unternehmensdaten Engerwitzdorf',
            'IT-Dienstleister Impressum',
            'Haftungsausschluss Österreich',
            'Gewerberecht Webentwicklung',
            'Imprint Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('Impressum | Websters');
        OpenGraph::setDescription('Rechtliche Informationen und Offenlegung von Websters gemäß österreichischem Recht.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');

        OpenGraph::addImage($siteUrl . '/assets/logo-og.jpg', [
            'width' => 1200,
            'height' => 630,
            'alt' => 'Websters – Impressum'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('Impressum | Websters');
        TwitterCard::setDescription('Rechtliche Informationen und Offenlegung von Websters aus Engerwitzdorf.');
        TwitterCard::setImage($siteUrl . '/assets/images/logo-jsonld.jpg');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (EMPFEHLUNG: Organization statt LegalService)
        |--------------------------------------------------------------------------
        | "LegalService" ist für Anwälte, nicht für Impressum. Daher → Organization.
        | Google zeigt Impressumsdaten besser mit Organization/LocalBusiness an.
        */

        JsonLd::setType('Organization');
        JsonLd::setTitle('Impressum – Websters');
        JsonLd::setDescription('Rechtliche Informationen gemäß ECG, MedienG und österreichischem Unternehmensrecht.');
        JsonLd::setUrl($pageUrl);

        JsonLd::addValues([
            'name' => 'Websters',
            'legalName' => 'Websters e.U.',
            'description' => 'IT-Dienstleistung, Webdesign, Softwareentwicklung, Medienproduktion.',
            'url' => $siteUrl,
            'logo' => $siteUrl . '/assets/images/logo-jsonld.jpg',

            // Offizielle Impressumsadresse (Firmenbuch)
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Engerwitzdorf',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],

            // Kontaktangaben gemäß Impressumspflicht
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => ['German'],
                'telephone' => '+43660466179',
                'email' => 'office@websters.at',
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '17:00'
                ]
            ],

            // Firmenbuchdaten
            'founder' => [
                '@type' => 'Person',
                'name' => 'Michael Elias Ruep'
            ],

            'foundingDate' => '2026-02-11',

            // Branchenkompetenzen (SEO-Relevant)
            'knowsAbout' => [
                'Webdesign',
                'Software Development',
                'IT Consulting',
                'Media Production',
                'IT-Dienstleistung'
            ],

            // Firmenbuch (Offenlegung gemäß §25 MedienG / §63 GewO)
            'identifier' => [
                '@type' => 'PropertyValue',
                'name' => 'Firmenbuchnummer',
                'value' => 'FN 672300b'
            ],
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
                                        <dt class="font-medium text-slate-700">Unternehmen:</dt>
                                        <dd>Websters e.U.</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Rechtsform:</dt>
                                        <dd>Einzelunternehmen (e.U.)</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Inhaber:</dt>
                                        <dd>Michael Elias Ruep</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Anschrift:</dt>
                                        <dd>Libellenweg 13, 4209 Engerwitzdorf</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Sitz:</dt>
                                        <dd>Engerwitzdorf</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Firmenbuchnummer:</dt>
                                        <dd>FN 672300b (Handelsgericht Wien)</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Eingetragen am:</dt>
                                        <dd>11.02.2026</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Geschäftszweig:</dt>
                                        <dd>IT-Dienstleistung, Webdesign, Softwareentwicklung, Medienproduktion</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-slate-700">Gewerbeaufsichtsbehörde:</dt>
                                        <dd>Bezirkshauptmannschaft Freistadt</dd>
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
                                        <a href="mailto:office@websters.at"
                                           class="underline underline-offset-2 hover:text-primary transition">
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
                                werden, welche auf eine Webseite mit rechtswidriger Tätigkeit oder Information
                                verweisen,
                                ersuchen wir um einen dementsprechenden Hinweis, um diese nach § 17 Abs. 2 ECG
                                umgehend zu entfernen.
                            </p>
                            <p class="text-sm font-poppins text-slate-600">
                                Die Urheberrechte Dritter werden vom Betreiber dieser Webseite mit größter Sorgfalt
                                beachtet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden,
                                bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden derartiger
                                Rechtsverletzungen
                                werden wir den betroffenen Inhalt umgehend entfernen.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
