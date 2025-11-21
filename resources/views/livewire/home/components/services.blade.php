<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>
<section class="lg:pt-16 lg:mb-24" id="services">
    <div class="max-w-7xl mx-auto px-4 xl:px-0 flex flex-col items-start lg:items-center">
        <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs
                sm:px-3 sm:py-1.5 sm:text-sm">Services
        </div>
        <div
            class="bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text font-poppins text-2xl font-semibold text-transparent lg:text-5xl mt-6 text-left lg:text-center w-full lg:w-1/2 lg:leading-tight xl:mt-9"
        >
            Unsere Dienstleistungen
        </div>
        <p
            class="text-sm font-medium text-slate-600 leading-normal lg:leading-normal lg:text-base mt-4 text-left lg:text-center w-full lg:w-2/3 xl:w-2/5"
        >
            Von modernem Webdesign bis zu individueller Software – wir entwickeln maßgeschneiderte Lösungen für deinen
            digitales Wachstum.
        </p>
        <div
            class="mt-12 grid gap-y-4 w-full md:gap-y-6 md:px-4 lg:mt-16 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-0 lg:px-8"
        >
            <!-- Webdesign & Design Card -->
            <article
                class="flex flex-col rounded-2xl border border-neutral-200 p-4 shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)] lg:justify-between lg:rounded-[2rem] lg:p-6"
            >
                <div>
                    <img
                        class="mb-4 h-40 w-full rounded-lg object-cover object-left-top lg:mb-6 lg:h-52 lg:rounded-2xl"
                        src="https://tailkits.com/ui/iframe/assets/img/bg-linear-1.png"
                        alt="Webdesign & Design"
                    />
                    <x-icon name="fas.paint-brush" class="h-5 text-brand-dark opacity-60 lg:h-6"/>
                    <div
                        class="mt-4 flex flex-wrap items-start gap-x-2 gap-y-1.5 lg:mt-6"
                    >
                        <div class="font-bold text-brand-dark">Webdesign & Design</div>
                        <div
                            class="items-center justify-center rounded-full text-sm font-semibold whitespace-nowrap bg-primary text-white px-2 py-0.5"
                        >
                            modern
                        </div>
                    </div>
                    <p class="mt-2 text-sm font-medium text-neutral-500">
                        Moderne, responsive Websites und ansprechendes Design, das deine Marke optimal präsentiert und
                        Besucher begeistert.
                    </p>
                </div>
                <x-button
                    link="/projects"
                    class="items-center justify-center whitespace-nowrap btn btn-sm text-white lg:btn-md btn-primary mt-4"
                    label="Projekte ansehen"
                />
            </article>

            <!-- Dashboards Card -->
            <article
                class="flex flex-col rounded-2xl border border-neutral-200 p-4 shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)] lg:justify-between lg:rounded-[2rem] lg:p-6"
            >
                <div>
                    <img
                        class="mb-4 h-40 w-full rounded-lg object-cover object-left-top lg:mb-6 lg:h-52 lg:rounded-2xl"
                        src="https://tailkits.com/ui/iframe/assets/img/bg-linear-3.png"
                        alt="Dashboards"
                    />
                    <x-icon name="fas.grip" class="h-5 text-brand-dark opacity-60 lg:h-7"/>
                    <div
                        class="mt-4 flex flex-wrap items-start gap-x-2 gap-y-1.5 lg:mt-6"
                    >
                        <div class="font-bold text-brand-dark">Dashboards</div>
                        <div
                            class="items-center justify-center rounded-full text-sm font-semibold whitespace-nowrap bg-secondary text-white px-2 py-0.5"
                        >
                            intuitiv
                        </div>
                    </div>
                    <p class="mt-2 text-sm font-medium text-neutral-500">
                        Übersichtliche, sowie maßgescheinderte Dashboards zur Visualisierung deiner Daten und
                        Prozessoptimierung.
                    </p>
                </div>
                <x-button
                    link="/projects"
                    class="items-center justify-center whitespace-nowrap text-white btn btn-sm lg:btn-md btn-secondary mt-4"
                    label="Projekte ansehen"
                />
            </article>

            <!-- Custom Software Card -->
            <article
                class="flex flex-col rounded-2xl border border-neutral-200 p-4 shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)] lg:justify-between lg:rounded-[2rem] lg:p-6"
            >
                <div>
                    <img
                        class="mb-4 h-40 w-full rounded-lg object-cover object-left-top lg:mb-6 lg:h-52 lg:rounded-2xl"
                        src="https://tailkits.com/ui/iframe/assets/img/bg-linear-4.png"
                        alt="Custom Software"
                    />
                    <x-icon name="fas.rocket" class="h-5 text-brand-dark opacity-60 lg:h-7"/>

                    <div
                        class="mt-4 flex flex-wrap items-start gap-x-2 gap-y-1.5 lg:mt-6"
                    >
                        <div class="font-bold text-brand-dark">
                            Custom Software
                        </div>
                        <div
                            class="items-center justify-center rounded-full text-sm font-semibold whitespace-nowrap inline-flex bg-primary text-white px-2 py-0.5"
                        >
                            maßgeschneidert
                        </div>
                    </div>
                    <p class="mt-2 text-sm font-medium text-neutral-500">
                        Individuelle Softwarelösungen, die perfekt auf deine Geschäftsprozesse und Anforderungen
                        abgestimmt sind.
                    </p>
                </div>

                <x-button
                    link="/projects"
                    class="items-center justify-center whitespace-nowrap btn btn-sm lg:btn-md btn-primary mt-4"
                    label="Projekte ansehen"
                />
            </article>
        </div>
    </div>
</section>
