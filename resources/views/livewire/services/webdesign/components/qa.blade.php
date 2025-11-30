<?php

use Livewire\Volt\Component;

new class extends Component { };

?>

<section class="lg:pt-16 pb-6 lg:pb-16 font-poppins" id="faq" x-data="{ active: null }">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="flex flex-col items-start md:px-4 lg:items-start lg:px-8">
            <div class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-2xl font-semibold text-transparent sm:w-2/3 md:w-1/2 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-2/3">
                Hast du weitere Fragen an uns bezüglich der Website-Entwicklung?
            </div>
            <p class="text-sm font-medium text-brand-dark leading-normal lg:leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5">
                Hier findest du häufig gestellte Fragen zu unseren Website-Paketen.
            </p>
        </div>

        <div class="mt-6 border-b border-b-neutral-100 lg:mt-8"></div>

        <div class="mt-6 space-y-3 md:px-4 lg:mt-9 lg:px-8">

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'kosten' ? active = null : active = 'kosten'"
                        :aria-expanded="active === 'kosten'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was kostet eine Website bei euch wirklich?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'kosten' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'kosten' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Unsere Pakete beginnen bei 990 € für den Website Starter, ab 1990 € für das Komplett-Paket und ab. 2990 € für die Premium-Variante. Der genaue Preis hängt von deinen individuellen Anforderungen ab, wir erstellen dir daher immer ein maßgeschneidertes Angebot ohne versteckte Kosten.
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'laufende-kosten' ? active = null : active = 'laufende-kosten'"
                        :aria-expanded="active === 'laufende-kosten'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Welche laufenden Kosten fallen nach dem Launch an?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'laufende-kosten' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'laufende-kosten' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Neben der einmaligen Entwicklung fallen monatliche Kosten für Hosting, Domain und optionales Wartungspaket an. Das Wartungspaket beinhaltet regelmäßige Updates, Sicherheitschecks, Backups und technischen Support. Alle Kosten sind transparent und es gibt keine versteckten Gebühren.
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'dauer' ? active = null : active = 'dauer'"
                        :aria-expanded="active === 'dauer'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Wie lange dauert es, bis meine Website online geht?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'dauer' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'dauer' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Ein typisches Projekt durchläuft unseren 5-Phasen-Prozess und ist in 4-6 Wochen fertiggestellt. Der Website Starter kann bereits in 2-3 Wochen realisiert werden, während komplexere Projekte 6-8 Wochen in Anspruch nehmen können. Wir halten dich in jedem Schritt auf dem Laufenden.
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'enthalten' ? active = null : active = 'enthalten'"
                        :aria-expanded="active === 'enthalten'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was ist im Preis alles enthalten?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'enthalten' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'enthalten' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Jedes Paket beinhaltet professionelles Webdesign, responsive Umsetzung für alle Geräte, SEO-Grundoptimierung, Kontaktformular und das Einpflegen deiner Inhalte. In den höheren Paketen kommen professionelles Copywriting, erweiterte SEO-Maßnahmen und individuelle Funktionen dazu. Alle Details besprechen wir transparent vor Projektstart.
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'erweiterung' ? active = null : active = 'erweiterung'"
                        :aria-expanded="active === 'erweiterung'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Kann ich die Website später selbst bearbeiten?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'erweiterung' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'erweiterung' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Ja, alle unsere Websites werden mit einem benutzerfreundlichen Content-Management-System ausgeliefert. Du kannst Texte, Bilder und Seiten problemlos selbst bearbeiten. Auf Wunsch bieten wir auch eine Einführung in die Bedienung an, damit du dich von Anfang an sicher fühlst.
                    </div>
                </div>
            </div>

            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'support' ? active = null : active = 'support'"
                        :aria-expanded="active === 'support'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Welche Unterstützung erhalte ich nach dem Go-Live?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'support' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'support' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Nach dem Launch stehst du nicht alleine da. Wir bieten 30 Tage kostenlosen Support für technische Fragen, optional kannst du ein Wartungspaket mit regelmäßigen Updates, Sicherheitschecks und Backup-Service hinzubuchen. So bleibt deine Website langfristig sicher und up-to-date.
                    </div>
                </div>
            </div>
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'referenz' ? active = null : active = 'referenz'"
                        :aria-expanded="active === 'referenz'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Können wir vor der Beauftragung Referenzen sehen?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'referenz' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'referenz' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Selbstverständlich. In unserem persönlichen Gespräch zeigen wir dir gerne Referenzprojekte aus deiner Branche und beantworten alle Fragen zu unserer Arbeitsweise. Viele unserer Kunden sind auch bereit, direkt von ihren Erfahrungen mit uns zu berichten.                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
