<?php

use Livewire\Volt\Component;

new class extends Component { };

?>

<section class="lg:pt-16 pb-6 lg:pb-16 font-poppins" id="faq" x-data="{ active: 0 }">
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

            <!-- FAQ – Was enthalten die Pakete? -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'pakete' ? active = null : active = 'pakete'"
                        :aria-expanded="active === 'pakete'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was ist in den Website-Paketen enthalten?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'pakete' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'pakete' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        <strong>Website Starter:</strong> 1–3 Unterseiten, responsives Design & Kontaktformular — ideal für kleine Unternehmen und schnelle Online-Präsenz.<br>
                        <strong>Website Komplett:</strong> bis zu 8 Seiten, professionelles Copywriting, Grund-SEO & kompletter Launch-Service — perfekt für wachsende Unternehmen.<br>
                        <strong>Website Premium:</strong> unbegrenzte Seitenanzahl, Premium-Design und individuelle Software-Features — für maximale Flexibilität und Performance.
                    </div>
                </div>
            </div>

            <!-- FAQ – Fallen nach dem Launch Kosten an? -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'kosten' ? active = null : active = 'kosten'"
                        :aria-expanded="active === 'kosten'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Fallen nach dem Launch laufende Kosten an?
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
                        Ja, neben der einmaligen Entwicklung fallen oft laufende Kosten an: Hosting, Domain & ggf. Wartung (Sicherheit, Backups, Updates). Die Höhe hängt vom Umfang, Traffic und Funktionalität der Website ab.
                    </div>
                </div>
            </div>

            <!-- FAQ – Wartung & Support möglich? -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'wartung' ? active = null : active = 'wartung'"
                        :aria-expanded="active === 'wartung'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Bietet ihr auch Wartung oder Support nach dem Launch an?
                    </div>
                    <figure
                        class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5 transition-transform"
                        :class="active === 'wartung' ? 'rotate-45' : 'rotate-0'">
                        <svg class="h-4 w-4 text-slate-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                        </svg>
                    </figure>
                </button>
                <div class="overflow-hidden transition-[max-height] duration-200 ease-out" :class="active === 'wartung' ? 'max-h-96' : 'max-h-0'">
                    <div class="px-4 pb-4 pt-0 text-sm text-neutral-600 lg:text-base">
                        Ja, auf Wunsch übernehmen wir Hosting, Backups, Updates und technischen Support. Damit bleibt deine Website sicher, performant und jederzeit erreichbar.
                    </div>
                </div>
            </div>

            <!-- FAQ – Kann ich später Seiten oder Funktionen hinzufügen? -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button type="button"
                        @click="active === 'erweiterung' ? active = null : active = 'erweiterung'"
                        :aria-expanded="active === 'erweiterung'"
                        class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left cursor-pointer">
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Kann ich später Seiten oder Funktionen erweitern?
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
                        Ja, insbesondere bei unseren Paketen „Komplett“ oder „Premium“ ist ein Upgrade möglich. Weitere Seiten oder neue Funktionen können jederzeit ergänzt werden, nachdem wir gemeinsam Umfang & Anforderungen definieren.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
