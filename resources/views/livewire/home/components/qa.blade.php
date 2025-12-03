<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section class="lg:pt-16 pb-6 lg:pb-16 font-poppins" id="faq" x-data="{ active: 0 }">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="flex flex-col items-start md:px-4 lg:items-start lg:px-8">
            <div
                class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-2xl font-bold text-transparent sm:w-2/3 md:w-1/2 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-2/3"
            >
                Häufige Fragen zu Websters
            </div>
            <p
                class="text-sm font-medium text-brand-dark leading-normal lg:leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5"
            >
                Alles über unsere Webagentur, unsere Dienstleistungen und wie wir arbeiten.
            </p>
        </div>

        <div class="mt-6 border-b border-b-neutral-100 lg:mt-8"></div>

        <div class="mt-6 space-y-3 md:px-4 lg:mt-9 lg:px-8">
            <!-- Item 1 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 1 ? active = null : active = 1"
                    :aria-expanded="active === 1"
                    class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all cursor-pointer"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was bietet Websters genau an?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 1"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 1 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 1 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Wir entwickeln maßgeschneiderte Web-Lösungen: Von professionellen Websites über komplexe
                        Web-Apps
                        bis hin zu Custom Software. Unser Portfolio umfasst responsive Webdesign, API-Entwicklung,
                        Python-Skripte, Scraper, Backup-Lösungen und Systemintegrationen. Jedes Projekt wird individuell
                        auf deine Anforderungen zugeschnitten.
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 10 ? active = null : active = 10"
                    :aria-expanded="active === 10"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was für Custom Software bietet Websters an?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 10"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 10 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 10 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Wir entwickeln Custom Software die genau auf deine Geschäftsprozesse zugeschnitten ist.
                        Von Web Applications über Datenbank-Lösungen bis hin zu komplexen Systemintegrationen.
                        Unsere maßgeschneiderte Software optimiert deinen Arbeitsabläufe, steigert die Effizienz
                        und gibt dir einen Wettbewerbsvorteil durch individuelle Digital-Lösungen.
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 2 ? active = null : active = 2"
                    :aria-expanded="active === 2"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Wer steckt hinter Websters?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 2"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 2 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 2 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Websters wurde von drei HTL-Absolventen gegründet: Michael, Stevan und Manuel.
                        Seit über einem Jahr entwickeln wir gemeinsam Custom Software und setzen auf
                        moderne Technologien. Unsere Stärke liegt in der Kombination aus fundierter
                        technischer Ausbildung und praktischer Projekterfahrung.
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 3 ? active = null : active = 3"
                    :aria-expanded="active === 3"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Mit welchen Technologien arbeitet ihr?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 3"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 3 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 3 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Unsere Spezialgebiete sind Laravel mit Livewire für moderne Web-Anwendungen
                        und Python für Skripte, Scraper und Backend-Lösungen. Diese Website wurde
                        beispielsweise mit Laravel Livewire als Single Page Application umgesetzt
                        und ist auf GitHub verfügbar. Wir setzen auf moderne, wartbare Technologien.
                    </div>
                </div>
            </div>


            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 9 ? active = null : active = 9"
                    :aria-expanded="active === 9"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Python Entwicklung für Automatisierung und Data Solutions
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 9"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 9 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 9 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Unsere Python Expertise umfasst Web Scraping, Datenanalyse, Automatisierungslösungen,
                        API-Entwicklung und Backend-Systeme. Wir entwickeln maßgeschneiderte Python-Skripte
                        für deine spezifischen Anforderungen. Von Datenmigrationen über Prozessautomatisierung
                        bis hin zu komplexen Business Intelligence Lösungen.
                    </div>
                </div>
            </div>


            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 6 ? active = null : active = 6"
                    :aria-expanded="active === 6"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was kostet eine professionelle Website in Österreich?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 6"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 6 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 6 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Die Kosten für eine professionelle Website in Österreich beginnen bei 990€ für eine einfache Firmenwebsite.
                        Unser Website Starter Paket bietet 1-3 Unterseiten, responsives Design und Kontaktformular.
                        Für umfassendere Lösungen mit bis zu 8 Seiten empfehlen wir unser Komplett-Paket ab 1990€.
                        Individuelle Web-Anwendungen und Premium-Websites starten bei 2990€. Jedes Angebot ist maßgeschneidert.
                    </div>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 4 ? active = null : active = 4"
                    :aria-expanded="active === 4"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was unterscheidet euch von anderen Agenturen?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 4"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 4 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 4 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Als kleines, spezialisiertes Team bieten wir direkten Kontakt zu den Entwicklern
                        ohne lange Kommunikationswege. Wir kombinieren Webdesign mit fundierter
                        Softwareentwicklung und liefern keine Standardlösungen, sondern individuell
                        entwickelte Systeme. Unsere HTL-Ausbildung garantiert technische Exzellenz.
                    </div>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 5 ? active = null : active = 5"
                    :aria-expanded="active === 5"
                    class="cursor-pointer flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Könnt ihr auch bestehende Projekte übernehmen?
                    </div>

                    <div class="flex items-center gap-x-2">
                        <span
                            class="hidden text-xs font-medium text-slate-600 md:inline-block"
                            x-show="active === 5"
                            x-transition.opacity
                        >
                            Schließen
                        </span>
                        <figure
                            class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                            :class="active === 5 ? 'rotate-45' : 'rotate-0'"
                        >
                            <svg
                                class="h-4 w-4 text-slate-700"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </figure>
                    </div>
                </button>

                <div
                    class="overflow-hidden transition-[max-height] duration-200 ease-out"
                    :class="active === 5 ? 'max-h-96' : 'max-h-0'"
                >
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Absolut! Wir übernehmen gerne bestehende Projekte und entwickeln diese weiter.
                        Egal ob Wartung, Erweiterungen oder komplette Neuentwicklung - wir analysieren
                        dein bestehendes System und finden die optimale Lösung. Auch Legacy-Systeme
                        und Code-Basen anderer Entwickler sind für uns kein Problem.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
