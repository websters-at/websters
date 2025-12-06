<?php
use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;

new class extends Component {
    public function mount(): void {

        $siteUrl = 'https://websters.at';
        $pageUrl = route('terms');

        /*
        |--------------------------------------------------------------------------
        | SEO META (OPTIMIERT)
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle('Geschäftsbedingungen');
        SEOMeta::setDescription(
            'Allgemeine Geschäftsbedingungen (AGB) der Webagentur Websters für Webdesign, Softwareentwicklung & IT-Consulting. Vertragsbedingungen & rechtliche Hinweise.'
        );
        SEOMeta::setCanonical($pageUrl);

        SEOMeta::addKeyword([
            'AGB Webagentur',
            'AGB Webdesign Österreich',
            'Softwareentwicklung Vertragsbedingungen',
            'IT Consulting AGB',
            'Websters Linz Geschäftsbedingungen',
            'Webagentur Linz Geschäftsbedingungen',
            'Projektvertrag IT Dienstleistungen',
            'Websters AGB'
        ]);

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle('AGB | Webagentur Websters Linz');
        OpenGraph::setDescription('Allgemeine Geschäftsbedingungen für Webdesign, Softwareentwicklung & IT-Consulting.');
        OpenGraph::setUrl($pageUrl);
        OpenGraph::setSiteName('Webagentur Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage($siteUrl . '/assets/websters-full-logo.png', [
            'width' => 1200,
            'height' => 630,
            'alt'    => 'AGB der Webagentur Websters'
        ]);

        /*
        |--------------------------------------------------------------------------
        | TWITTER CARD
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle('AGB | Webagentur Websters');
        TwitterCard::setDescription('Allgemeine Geschäftsbedingungen der Webagentur Websters aus Linz.');
        TwitterCard::setImage($siteUrl . '/assets/websters-full-logo.png');
        TwitterCard::setSite('@WebstersAgency');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD (LEGAL / AGB)
        |--------------------------------------------------------------------------
        | Struktur: WebPage → mainEntity (Organization) → hasPart (Legal sections)
        |--------------------------------------------------------------------------
        */

        // Grundstruktur
        JsonLd::setType('WebPage');
        JsonLd::setTitle('Allgemeine Geschäftsbedingungen der Webagentur Websters');
        JsonLd::setDescription('Rechtliche Bestimmungen, Vertragsbedingungen & AGB.');
        JsonLd::setUrl($pageUrl);

        // Rechtsinformationen
        JsonLd::addValues([
            'datePublished' => '2025-11-30',
            'dateModified'  => '2025-11-30',
            'jurisdiction'  => 'AT',
            'applicableLaw' => [
                'Österreichisches Unternehmensgesetzbuch (UGB)',
                'Allgemeines bürgerliches Gesetzbuch (ABGB)',
                'Bundesgesetz gegen den unlauteren Wettbewerb (UWG)'
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | ORGANIZATION (MAIN ENTITY)
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('mainEntity', [
            '@type' => 'Organization',
            'name' => 'Webagentur Websters',
            'legalName' => 'Stevan Vlajic',
            'url'  => $siteUrl,
            'logo' => $siteUrl . '/assets/websters-full-logo.png',
            'description' => 'Webagentur für Webdesign, Softwareentwicklung & IT-Consulting.',

            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Libellenweg 13',
                'addressLocality' => 'Außertreffling',
                'postalCode' => '4209',
                'addressRegion' => 'Oberösterreich',
                'addressCountry' => 'AT'
            ],

            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude'  => 48.338742140853945,
                'longitude' => 14.343424971406712
            ],

            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => ['German'],
                'telephone' => '+43 677 63177763',
                'email' => 'office@websters.at',
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
                    'opens'  => '09:00',
                    'closes' => '17:00'
                ]
            ],

            'priceRange' => '€€-€€€'
        ]);

        /*
        |--------------------------------------------------------------------------
        | HAS PART – AGB TEILBEREICHE
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('hasPart', [
            [
                '@type' => 'WebPageElement',
                'name' => 'Honorarvereinbarung',
                'description' => 'Regelungen zu Preisen, Zahlungsbedingungen & Rechnungslegung'
            ],
            [
                '@type' => 'WebPageElement',
                'name' => 'Haftungsbestimmungen',
                'description' => 'Haftungsausschluss & Schadenersatzklauseln'
            ],
            [
                '@type' => 'WebPageElement',
                'name' => 'Geheimhaltung',
                'description' => 'Vertraulichkeitsregeln & Datenschutzgrundlagen'
            ],
            [
                '@type' => 'WebPageElement',
                'name' => 'Urheberrecht',
                'description' => 'Nutzungsrechte & geistiges Eigentum an gelieferten Leistungen'
            ],
            [
                '@type' => 'WebPageElement',
                'name' => 'Vertragslaufzeit & Kündigung',
                'description' => 'Regelungen zur Dauer von Projekten & Beendigungsmodalitäten'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | GEBIETE
        |--------------------------------------------------------------------------
        */

        JsonLd::addValue('areaServed', [
            ['@type' => 'Country', 'name' => 'Österreich'],
            ['@type' => 'Country', 'name' => 'Deutschland']
        ]);
    }
};
?>

<section
    class="mt-32 lg:mt-16 mb-8 lg:mb-4 lg:pt-20 relative"
    id="agb"
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
                    style="transition-delay:.15s"
                >
                    AGB
                </div>

                <div
                    class="mt-6 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-2xl font-poppins font-bold text-transparent lg:text-4xl lg:leading-tight lg:mt-8 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.25s"
                >
                    Allgemeine Geschäftsbedingungen
                </div>

                <p
                    class="mt-4 text-sm font-poppins text-slate-600 sm:w-4/5 lg:w-3/5 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.3s"
                >
                    Nachfolgend finden Sie die Allgemeinen Geschäftsbedingungen (AGB) von Stevan Vlajic.
                </p>
            </div>

            <!-- 1. Allgemeine Grundlagen / Geltungsbereich -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.35s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">1. Allgemeine Grundlagen / Geltungsbereich</h3>

                    <p><span class="font-semibold">1.1</span>
                        Für sämtliche Rechtsgeschäfte zwischen dem Auftraggeber und Stevan Vlajic gelten ausschließlich
                        diese Allgemeinen Geschäftsbedingungen. Maßgeblich ist jeweils die zum Zeitpunkt des
                        Vertragsabschlusses gültige Fassung.
                    </p>

                    <p><span class="font-semibold">1.2</span>
                        Diese Allgemeinen Geschäftsbedingungen gelten auch für alle künftigen Vertragsbeziehungen,
                        somit auch dann, wenn bei Zusatzverträgen darauf nicht ausdrücklich hingewiesen wird.
                    </p>

                    <p><span class="font-semibold">1.3</span>
                        Entgegenstehende Allgemeine Geschäftsbedingungen des Auftraggebers sind ungültig, es sei denn,
                        diese werden von Stevan Vlajic ausdrücklich schriftlich anerkannt.
                    </p>

                    <p><span class="font-semibold">1.4</span>
                        Für den Fall, dass einzelne Bestimmungen dieser Allgemeinen Geschäftsbedingungen unwirksam sein
                        und/oder werden sollten, berührt dies die Wirksamkeit der verbleibenden Bestimmungen und der
                        unter ihrer Zugrundelegung geschlossenen Verträge nicht. Die unwirksame ist durch eine wirksame
                        Bestimmung, die ihr dem Sinn und wirtschaftlichen Zweck nach am nächsten kommt, zu ersetzen.
                    </p>

                </div>
            </div>

            <!-- 2. Umfang des Auftrags -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.4s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">
                        2. Umfang des Auftrags (Interim Management, Beratung, Training)
                    </h3>

                    <p><span class="font-semibold">2.1</span>
                        Der Umfang eines konkreten Auftrags wird im Einzelfall vertraglich vereinbart.
                    </p>

                    <p><span class="font-semibold">2.2</span>
                        Stevan Vlajic ist berechtigt, die ihm obliegenden Aufgaben ganz oder teilweise durch Dritte
                        erbringen zu lassen. Die Bezahlung des Dritten erfolgt ausschließlich durch Stevan Vlajic
                        selbst. Es entsteht kein wie immer geartetes direktes Vertragsverhältnis zwischen dem Dritten
                        und dem Auftraggeber.
                    </p>

                    <p><span class="font-semibold">2.3</span>
                        Der Auftraggeber verpflichtet sich, während sowie bis zum Ablauf von drei Jahren nach
                        Beendigung dieses Vertragsverhältnisses keine wie immer geartete Geschäftsbeziehung zu Personen
                        oder Gesellschaften einzugehen, deren sich Stevan Vlajic zur Erfüllung seiner vertraglichen
                        Pflichten bedient. Der Auftraggeber wird diese Personen und Gesellschaften insbesondere nicht
                        mit solchen oder ähnlichen Leistungen beauftragen, die auch Stevan Vlajic anbietet.
                    </p>

                </div>
            </div>

            <!-- 3. Aufklärungspflicht -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.45s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">
                        3. Aufklärungspflicht des Auftraggebers / Vollständigkeitserklärung
                    </h3>

                    <p><span class="font-semibold">3.1</span>
                        Der Auftraggeber sorgt dafür, dass die organisatorischen Rahmenbedingungen bei Erfüllung des
                        Auftrags an seinem Geschäftssitz ein möglichst ungestörtes, dem raschen Fortgang des
                        Auftragsprozesses förderliches Arbeiten erlauben.
                    </p>

                    <p><span class="font-semibold">3.2</span>
                        Der Auftraggeber wird Stevan Vlajic auch über vorher durchgeführte und/oder laufende Leistungen
                        – auch auf anderen Fachgebieten – umfassend informieren.
                    </p>

                    <p><span class="font-semibold">3.3</span>
                        Der Auftraggeber sorgt dafür, dass Stevan Vlajic auch ohne dessen besondere Aufforderung alle
                        für die Erfüllung und Ausführung des Auftrags notwendigen Unterlagen zeitgerecht vorgelegt
                        werden und ihm von allen Vorgängen und Umständen Kenntnis gegeben wird, die für die Ausführung
                        des Auftrags von Bedeutung sind. Dies gilt auch für alle Unterlagen, Vorgänge und Umstände, die
                        erst während der Tätigkeit von Stevan Vlajic bekannt werden.
                    </p>

                    <p><span class="font-semibold">3.4</span>
                        Der Auftraggeber sorgt dafür, dass seine Mitarbeiter und die gesetzlich vorgesehene und
                        gegebenenfalls eingerichtete Arbeitnehmervertretung (Betriebsrat) bereits vor Beginn der
                        Tätigkeit von Stevan Vlajic von dieser informiert werden.
                    </p>

                </div>
            </div>

            <!-- 4. Sicherung der Unabhängigkeit -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.5s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">4. Sicherung der Unabhängigkeit</h3>

                    <p><span class="font-semibold">4.1</span>
                        Die Vertragspartner verpflichten sich zur gegenseitigen Loyalität.
                    </p>

                    <p><span class="font-semibold">4.2</span>
                        Die Vertragspartner verpflichten sich gegenseitig, alle Vorkehrungen zu treffen, die geeignet
                        sind, die Gefährdung der Unabhängigkeit der beauftragten Dritten und Mitarbeiter von Stevan
                        Vlajic zu verhindern. Dies gilt insbesondere für Angebote des Auftraggebers auf Anstellung bzw.
                        der Übernahme von Aufträgen auf eigene Rechnung.
                    </p>

                </div>
            </div>

            <!-- 5. Berichterstattung -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.55s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">5. Berichterstattung / Berichtspflicht</h3>

                    <p><span class="font-semibold">5.1</span>
                        Stevan Vlajic verpflichtet sich, über seine Arbeit, die seiner Mitarbeiter und gegebenenfalls
                        auch die beauftragter Dritter dem Arbeitsfortschritt entsprechend dem Auftraggeber Bericht zu
                        erstatten.
                    </p>

                    <p><span class="font-semibold">5.2</span>
                        Den Schlussbericht erhält der Auftraggeber in angemessener Zeit, d.&nbsp;h. zwei bis vier Wochen,
                        je nach Art der Leistung, nach Abschluss des Auftrages.
                    </p>

                    <p><span class="font-semibold">5.3</span>
                        Stevan Vlajic ist bei der Herstellung des vereinbarten Werkes weisungsfrei, handelt nach
                        eigenem Gutdünken und in eigener Verantwortung. Er ist an keinen bestimmten Arbeitsort und
                        keine bestimmte Arbeitszeit gebunden.
                    </p>

                </div>
            </div>

            <!-- 6. Schutz des geistigen Eigentums -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.6s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">6. Schutz des geistigen Eigentums</h3>

                    <p><span class="font-semibold">6.1</span>
                        Die Urheberrechte an den von Stevan Vlajic und seinen Mitarbeitern und beauftragten Dritten
                        geschaffenen Werken (insbesondere Anbote, Berichte, Analysen, Gutachten, Organisationspläne,
                        Programme, Leistungsbeschreibungen, Entwürfe, Berechnungen, Zeichnungen, Datenträger etc.)
                        verbleiben bei Stevan Vlajic. Sie dürfen vom Auftraggeber während und nach Beendigung des
                        Vertragsverhältnisses ausschließlich für vom Vertrag umfasste Zwecke verwendet werden. Der
                        Auftraggeber ist insofern nicht berechtigt, das Werk (die Werke) ohne ausdrückliche Zustimmung
                        von Stevan Vlajic zu vervielfältigen und/oder zu verbreiten. Keinesfalls entsteht durch eine
                        unberechtigte Vervielfältigung/Verbreitung des Werkes eine Haftung von Stevan Vlajic –
                        insbesondere etwa für die Richtigkeit des Werkes – gegenüber Dritten.
                    </p>

                    <p><span class="font-semibold">6.2</span>
                        Der Verstoß des Auftraggebers gegen diese Bestimmungen berechtigt Stevan Vlajic zur sofortigen
                        vorzeitigen Beendigung des Vertragsverhältnisses und zur Geltendmachung anderer gesetzlicher
                        Ansprüche, insbesondere auf Unterlassung und/oder Schadenersatz.
                    </p>

                </div>
            </div>

            <!-- 7. Schlechtleistung -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.65s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">7. Schlechtleistung</h3>

                    <p><span class="font-semibold">7.1</span>
                        Stevan Vlajic ist ohne Rücksicht auf ein Verschulden berechtigt und verpflichtet, bekannt
                        werdende Unrichtigkeiten und Mängel an seiner Leistung zu beheben. Stevan Vlajic wird den
                        Auftraggeber hievon unverzüglich in Kenntnis setzen.
                    </p>

                    <p><span class="font-semibold">7.2</span>
                        Dieser Anspruch des Auftraggebers erlischt nach sechs Monaten nach Erbringen der jeweiligen
                        Leistung.
                    </p>

                </div>
            </div>

            <!-- 8. Haftung / Schadenersatz -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.7s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">8. Haftung / Schadenersatz</h3>

                    <p><span class="font-semibold">8.1</span>
                        Stevan Vlajic haftet dem Auftraggeber für Schäden – ausgenommen für Personenschäden – nur im
                        Falle groben Verschuldens (Vorsatz oder grobe Fahrlässigkeit). Dies gilt sinngemäß auch für
                        Schäden, die auf von Stevan Vlajic beigezogene Dritte zurückgehen. Sowohl die Haftung für
                        leichte Fahrlässigkeit als auch jede Haftung für entgangenen Gewinn wird ausgeschlossen.
                    </p>

                    <p><span class="font-semibold">8.2</span>
                        Schadenersatzansprüche des Auftraggebers können nur innerhalb von sechs Monaten ab Kenntnis von
                        Schaden und Schädiger, spätestens aber innerhalb von drei Jahren nach dem
                        anspruchsbegründenden Ereignis gerichtlich geltend gemacht werden.
                    </p>

                    <p><span class="font-semibold">8.3</span>
                        Der Auftraggeber hat jeweils den Beweis zu erbringen, dass der Schaden auf ein Verschulden von
                        Stevan Vlajic zurückzuführen ist.
                    </p>

                    <p><span class="font-semibold">8.4</span>
                        Sofern Stevan Vlajic die Leistung unter Zuhilfenahme Dritter erbringt und in diesem Zusammenhang
                        Gewährleistungs- und/oder Haftungsansprüche gegenüber diesen Dritten entstehen, tritt Stevan
                        Vlajic diese Ansprüche an den Auftraggeber ab. Der Auftraggeber wird sich in diesem Fall
                        vorrangig an diese Dritten halten.
                    </p>

                    <p><span class="font-semibold">8.5</span>
                        In jedem Fall ist die Haftung von Stevan Vlajic, im gesetzlich zulässigen Rahmen, auf die Höhe
                        des halben Honorars beschränkt.
                    </p>

                </div>
            </div>

            <!-- 9. Geheimhaltung / Datenschutz -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.75s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">9. Geheimhaltung / Datenschutz</h3>

                    <p><span class="font-semibold">9.1</span>
                        Stevan Vlajic verpflichtet sich zu unbedingtem Stillschweigen über alle ihm zur Kenntnis
                        gelangenden geschäftlichen Angelegenheiten, insbesondere Geschäfts- und Betriebsgeheimnisse
                        sowie jedwede Information, die er über Art, Betriebsumfang und praktische Tätigkeit des
                        Auftraggebers erhält.
                    </p>

                    <p><span class="font-semibold">9.2</span>
                        Weiters verpflichtet sich Stevan Vlajic, über den gesamten Inhalt des Werkes sowie sämtliche
                        Informationen und Umstände, die ihm im Zusammenhang mit der Erstellung des Werkes zugegangen
                        sind, insbesondere auch über die Daten von Klienten des Auftraggebers, Dritten gegenüber
                        Stillschweigen zu bewahren.
                    </p>

                    <p><span class="font-semibold">9.3</span>
                        Stevan Vlajic ist von der Schweigepflicht gegenüber allfälligen Gehilfen und Stellvertretern,
                        denen er sich bedient, entbunden. Er hat die Schweigepflicht aber auf diese vollständig zu
                        überbinden und haftet für deren Verstoß gegen die Verschwiegenheitsverpflichtung wie für einen
                        eigenen Verstoß.
                    </p>

                    <p><span class="font-semibold">9.4</span>
                        Die Schweigepflicht reicht 5 Jahre über das Ende dieses Vertragsverhältnisses hinaus. Ausnahmen
                        bestehen im Falle gesetzlich vorgesehener Aussageverpflichtungen.
                    </p>

                    <p><span class="font-semibold">9.5</span>
                        Stevan Vlajic ist berechtigt, ihm anvertraute personenbezogene Daten im Rahmen der
                        Zweckbestimmung des Vertragsverhältnisses zu verarbeiten. Der Auftraggeber leistet Stevan
                        Vlajic Gewähr, dass hierfür sämtliche erforderlichen Maßnahmen insbesondere jene im Sinne des
                        Datenschutzgesetzes, wie etwa Zustimmungserklärungen der Betroffenen, getroffen worden sind.
                    </p>

                </div>
            </div>

            <!-- 10. Honorar -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.8s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">10. Honorar</h3>

                    <p><span class="font-semibold">10.1</span>
                        Nach Vollendung der vereinbarten Leistung erhält Stevan Vlajic ein Honorar gemäß der
                        Vereinbarung zwischen dem Auftraggeber und Stevan Vlajic. Stevan Vlajic ist berechtigt,
                        entsprechend der Vereinbarung zwischen dem Auftraggeber und Stevan Vlajic Zwischenabrechnungen
                        zu legen und dem jeweiligen Fortschritt entsprechende Akonti zu verlangen. Das Honorar ist
                        jeweils mit Rechnungslegung durch Stevan Vlajic fällig.
                    </p>

                    <p><span class="font-semibold">10.2</span>
                        Stevan Vlajic wird jeweils eine zum Vorsteuerabzug berechtigende Rechnung mit allen gesetzlich
                        erforderlichen Merkmalen ausstellen.
                    </p>

                    <p><span class="font-semibold">10.3</span>
                        Anfallende Barauslagen, Spesen, Reisekosten etc. sind gegen Rechnungslegung von Stevan Vlajic
                        vom Auftraggeber mit einem Verwaltungsaufschlag von 3&nbsp;% zusätzlich zu ersetzen.
                    </p>

                    <p><span class="font-semibold">10.4</span>
                        Unterbleibt die Ausführung der vereinbarten Leistung aus Gründen, die auf Seiten des
                        Auftraggebers liegen, oder aufgrund einer berechtigten vorzeitigen Beendigung des
                        Vertragsverhältnisses durch Stevan Vlajic, so behält Stevan Vlajic den Anspruch auf Zahlung des
                        gesamten vereinbarten Honorars abzüglich ersparter Aufwendungen. Im Falle der Vereinbarung
                        eines Stundenhonorars ist das Honorar für jene Stundenanzahl, die für die gesamte vereinbarte
                        Leistung zu erwarten gewesen ist, abzüglich der ersparten Aufwendungen zu leisten. Die
                        ersparten Aufwendungen sind mit 30&nbsp;Prozent des Honorars für jene Leistungen, die Stevan
                        Vlajic bis zum Tage der Beendigung des Vertragsverhältnisses noch nicht erbracht hat,
                        pauschaliert vereinbart.
                    </p>

                    <p><span class="font-semibold">10.5</span>
                        Im Falle der Nichtzahlung von Zwischenabrechnungen ist Stevan Vlajic von seiner Verpflichtung,
                        weitere Leistungen zu erbringen, befreit. Die Geltendmachung weiterer aus der Nichtzahlung
                        resultierender Ansprüche wird dadurch aber nicht berührt.
                    </p>

                </div>
            </div>

            <!-- 11. Elektronische Rechnungslegung -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.85s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">11. Elektronische Rechnungslegung</h3>

                    <p><span class="font-semibold">11.1</span>
                        Stevan Vlajic ist berechtigt, dem Auftraggeber Rechnungen auch in elektronischer Form zu
                        übermitteln. Der Auftraggeber erklärt sich mit der Zusendung von Rechnungen in elektronischer
                        Form durch Stevan Vlajic ausdrücklich einverstanden.
                    </p>

                </div>
            </div>

            <!-- 12. Dauer des Vertrages -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.9s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">12. Dauer des Vertrages</h3>

                    <p><span class="font-semibold">12.1</span>
                        Dieser Vertrag endet grundsätzlich mit dem Abschluss des vereinbarten Leistungszeitraums bzw.
                        Projekts.
                    </p>

                    <p><span class="font-semibold">12.2</span>
                        Der Vertrag kann dessen ungeachtet jederzeit aus wichtigen Gründen von jeder Seite ohne
                        Einhaltung einer Kündigungsfrist gelöst werden. Als wichtiger Grund ist insbesondere anzusehen:
                    </p>

                    <p class="pl-4">
                        – wenn ein Vertragspartner wesentliche Vertragsverpflichtungen verletzt oder<br>
                        – wenn ein Vertragspartner nach Eröffnung eines Insolvenzverfahrens in Zahlungsverzug gerät.<br>
                        – wenn berechtigte Bedenken hinsichtlich der Bonität eines Vertragspartners bestehen …
                    </p>

                </div>
            </div>

            <!-- 13. Schlussbestimmungen -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                 :class="{ 'show': show }"
                 style="transition-delay:.95s">
                <div class="p-5 sm:p-6 space-y-2 text-sm font-poppins text-slate-600">

                    <h3 class="font-semibold text-slate-800">13. Schlussbestimmungen</h3>

                    <p><span class="font-semibold">13.1</span>
                        Die Vertragsparteien bestätigen, alle Angaben im Vertrag gewissenhaft und wahrheitsgetreu
                        gemacht zu haben und verpflichten sich, allfällige Änderungen wechselseitig umgehend bekannt zu
                        geben.
                    </p>

                    <p><span class="font-semibold">13.2</span>
                        Änderungen des Vertrages und dieser AGB bedürfen der Schriftform; ebenso ein Abgehen von diesem
                        Formerfordernis. Mündliche Nebenabreden bestehen nicht.
                    </p>

                    <p><span class="font-semibold">13.3</span>
                        Auf diesen Vertrag ist materielles österreichisches Recht unter Ausschluss der
                        Verweisungsnormen des internationalen Privatrechts anwendbar. Erfüllungsort ist der Ort der
                        beruflichen Niederlassung von Stevan Vlajic. Für Streitigkeiten ist das Gericht am
                        Unternehmensort von Stevan Vlajic zuständig.
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>
