<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section
    class="lg:pt-16 pb-6 lg:pb-16 font-poppins"
    id="faq"
    x-data="{ active: 0, show: false }"
    x-intersect="show = true"
>

    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <!-- Heading -->
        <div class="flex flex-col items-start md:px-4 lg:items-start lg:px-8 fade-up"
             :class="{ 'show': show }"
             style="transition-delay:.05s">

            <h1
                class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-2xl font-bold text-transparent sm:w-2/3 md:w-1/2 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-2/3"
            >
                Häufige Fragen zu Websters
            </h1>

            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                Alles über unsere Webagentur, unsere Dienstleistungen und wie wir arbeiten.
            </p>
        </div>

        <div class="mt-6 border-b border-b-neutral-100 lg:mt-8 fade-up"
             :class="{ 'show': show }"
             style="transition-delay:.15s"></div>

        <!-- FAQ ITEMS -->
        <div class="mt-6 space-y-3 md:px-4 lg:mt-9 lg:px-8">

            <!-- FAQ ITEM TEMPLATE -->
            @php $delay = 0.25; @endphp

            @foreach([
                    1 => [
                        'q' => 'Was bietet Websters genau an?',
                        'a' => 'Wir entwickeln maßgeschneiderte Web-Lösungen: Von professionellen Websites über komplexe Web-Apps bis hin zu Custom Software. Unser Portfolio umfasst responsive Webdesign, API-Entwicklung, Python-Skripte, Scraper, Backup-Lösungen und Systemintegrationen. Jedes Projekt wird individuell auf deine Anforderungen zugeschnitten.'
                    ],

                    10 => [
                        'q' => 'Was für Custom Software bietet Websters an?',
                        'a' => 'Wir entwickeln Custom Software, die genau auf deine Geschäftsprozesse zugeschnitten ist. Von Web Applications über Datenbank-Lösungen bis hin zu komplexen Systemintegrationen. Unsere maßgeschneiderte Software optimiert deinen Arbeitsabläufe, steigert die Effizienz und gibt dir einen Wettbewerbsvorteil durch individuelle Digital-Lösungen.'
                    ],

                    2 => [
                        'q' => 'Wer steckt hinter Websters?',
                        'a' => 'Websters wurde von drei HTL-Absolventen gegründet: Michael, Stevan und Manuel. Seit über einem Jahr entwickeln wir gemeinsam Custom Software und setzen auf moderne Technologien. Unsere Stärke liegt in der Kombination aus fundierter technischer Ausbildung und praktischer Projekterfahrung.'
                    ],

                    3 => [
                        'q' => 'Mit welchen Technologien arbeitet ihr?',
                        'a' => 'Unsere Spezialgebiete sind Laravel mit Livewire für moderne Web-Anwendungen und Python für Skripte, Scraper und Backend-Lösungen. Diese Website wurde beispielsweise mit Laravel Livewire als Single Page Application umgesetzt und ist auf GitHub verfügbar. Wir setzen auf moderne, wartbare Technologien.'
                    ],

                    9 => [
                        'q' => 'Python Entwicklung für Automatisierung und Data Solutions',
                        'a' => 'Unsere Python-Expertise umfasst Web Scraping, Datenanalyse, Automatisierungslösungen, API-Entwicklung und Backend-Systeme. Wir entwickeln maßgeschneiderte Python-Skripte für deine spezifischen Anforderungen – von Datenmigrationen über Prozessautomatisierung bis hin zu komplexen Business-Intelligence-Lösungen.'
                    ],

                    6 => [
                        'q' => 'Was kostet eine professionelle Website in Österreich?',
                        'a' => 'Die Kosten für eine professionelle Website in Österreich beginnen bei 990€ für eine einfache Firmenwebsite. Unser Website-Starter-Paket bietet 1–3 Unterseiten, responsives Design und Kontaktformular. Für umfassendere Lösungen mit bis zu 8 Seiten empfehlen wir unser Komplett-Paket ab 1990€. Individuelle Web-Anwendungen und Premium-Websites starten bei 2990€. Jedes Angebot ist maßgeschneidert.'
                    ],

                    4 => [
                        'q' => 'Was unterscheidet euch von anderen Agenturen?',
                        'a' => 'Als kleines, spezialisiertes Team bieten wir direkten Kontakt zu den Entwicklern ohne lange Kommunikationswege. Wir kombinieren Webdesign mit fundierter Softwareentwicklung und liefern keine Standardlösungen, sondern individuell entwickelte Systeme. Unsere HTL-Ausbildung garantiert technische Exzellenz.'
                    ],

                    5 => [
                        'q' => 'Könnt ihr auch bestehende Projekte übernehmen?',
                        'a' => 'Absolut! Wir übernehmen gerne bestehende Projekte und entwickeln diese weiter. Egal ob Wartung, Erweiterungen oder komplette Neuentwicklung – wir analysieren dein bestehendes System und finden die optimale Lösung. Auch Legacy-Systeme und Code-Basen anderer Entwickler sind für uns kein Problem.'
                    ],
                ] as $id => $faq)

                <div
                    class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay: {{ $delay }}s"
                >
                    <button
                        type="button"
                        @click="active === {{ $id }} ? active = null : active = {{ $id }}"
                        :aria-expanded="active === {{ $id }}"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all cursor-pointer"
                    >
                        <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                            {{ $faq['q'] }}
                        </div>

                        <div class="flex items-center gap-x-2">
                            <span
                                class="hidden text-xs font-medium text-slate-600 md:inline-block"
                                x-show="active === {{ $id }}"
                                x-transition.opacity
                            >
                                Schließen
                            </span>
                            <figure
                                class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                                :class="active === {{ $id }} ? 'rotate-45' : 'rotate-0'"
                            >
                                <svg class="h-4 w-4 text-slate-700"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </figure>
                        </div>
                    </button>

                    <div
                        class="overflow-hidden transition-[max-height] duration-200 ease-out"
                        :class="active === {{ $id }} ? 'max-h-96' : 'max-h-0'"
                    >
                        <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>

                @php $delay += 0.1; @endphp

            @endforeach
        </div>
    </div>
</section>
