<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section class="lg:pt-16 pb-6 lg:pb-16 font-poppins" id="faq" x-data="{ active: 0 }">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="flex flex-col items-start md:px-4 lg:items-start lg:px-8">
            <div
                class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-2xl font-semibold text-transparent sm:w-2/3 md:w-1/2 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-2/3"
            >
                Häufige Fragen zur Zusammenarbeit
            </div>
            <p
                class="text-sm font-medium text-brand-dark leading-normal lg:leading-normal lg:text-base mt-4 sm:w-2/3 md:w-1/2 xl:w-2/5"
            >
                Hier findest du Antworten darauf, wie wir arbeiten, worüber wir sprechen können
                und was passiert, nachdem du das Kontaktformular abgeschickt hast.
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
                    class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Wobei unterstützt ihr mich konkret?
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
                        Du kannst uns kontaktieren, wenn du ein bestehendes Projekt weiterentwickeln,
                        ein neues Produkt planen oder eine Idee technisch einschätzen lassen möchtest.
                        Wir unterstützen dich von der ersten Einschätzung bis zur konkreten Umsetzung.
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 2 ? active = null : active = 2"
                    :aria-expanded="active === 2"
                    class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Welche Themen kann ich mit euch besprechen?
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
                        Du kannst uns zu technischen Fragen, Produktideen, möglichen
                        Zusammenarbeitsszenarien und nächsten Schritten in deinem Projekt ansprechen.
                        Auch wenn du nur eine erste Einschätzung möchtest, bist du bei uns richtig.
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 3 ? active = null : active = 3"
                    :aria-expanded="active === 3"
                    class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Was passiert, nachdem ich das Kontaktformular abgeschickt habe?
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
                        Nachdem du das Formular abgeschickt hast, prüfen wir dein Anliegen und melden
                        uns zeitnah bei dir. In einem kurzen Gespräch klären wir deine Ziele, den
                        aktuellen Stand und mögliche nächste Schritte – transparent und verständlich.
                    </div>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 4 ? active = null : active = 4"
                    :aria-expanded="active === 4"
                    class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Mit wem spreche ich im Erstkontakt?
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
                        Du sprichst direkt mit unserem Entwicklerteam bzw. einer Person, die dein
                        Anliegen fachlich einordnen kann. So stellen wir sicher, dass du von Anfang an
                        ehrliches, technisches Feedback und realistische Einschätzungen bekommst.
                    </div>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                <button
                    type="button"
                    @click="active === 5 ? active = null : active = 5"
                    :aria-expanded="active === 5"
                    class="flex w-full items-center justify-between gap-x-4 rounded-2xl px-4 py-4 text-left transition-all"
                >
                    <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                        Ist die Anfrage über das Formular unverbindlich?
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
                        Ja, deine Anfrage ist unverbindlich. Im ersten Schritt geht es darum,
                        dein Vorhaben zu verstehen, offene Fragen zu klären und zu prüfen, ob und wie
                        wir dich sinnvoll unterstützen können – erst danach sprechen wir über konkrete
                        Konditionen.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
