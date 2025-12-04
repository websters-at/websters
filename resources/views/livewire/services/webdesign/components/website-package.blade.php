<?php

use Livewire\Volt\Component;

new class extends Component {

};
?>

<section
    class="relative overflow-hidden"
    id="website"
    x-data="{ show: false }"
    x-intersect="show = true"
>

    <!-- Background Blur -->
    <div class="absolute inset-0 -z-10 opacity-70 pointer-events-none fade-up"
         :class="{ 'show': show }"
         style="transition-delay:.05s"
    >
        <div class="absolute top-24 left-1/3 w-80 h-80 bg-white/50 blur-[140px] rounded-full"></div>
        <div class="absolute top-40 right-1/4 w-72 h-72 bg-neutral-200/40 blur-[130px] rounded-full"></div>
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-64 h-64 bg-white/30 blur-[110px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="grid gap-y-8 md:px-4 lg:grid-cols-2 lg:items-center lg:gap-x-12 lg:gap-y-0 lg:px-8">

            <!-- IMAGE -->
            <div
                class="relative order-1 lg:order-2 flex justify-center fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.2s"
            >
                <img
                    class="h-64 w-full rounded-3xl object-contain lg:h-full"
                    src="{{ asset('/assets/website.png') }}"
                    alt="WebLaunch Suite"
                />
            </div>

            <!-- TEXT -->
            <div
                class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left order-2 lg:order-1"
            >

                <!-- BADGE -->
                <div
                    class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white
                        badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.3s"
                >
                    Paket: Webdesign
                </div>

                <!-- HEADLINE -->
                <div
                    class="mt-8 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text
                        text-2xl font-poppins font-bold text-transparent
                        sm:w-4/5 md:w-3/5 lg:mt-9 lg:w-11/12 lg:text-4xl lg:leading-tight xl:w-3/4 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.4s"
                >
                    Deine Website – professionell erstellt & bereit für den Launch
                </div>

                <!-- PARAGRAPH 1 -->
                <p
                    class="mt-4 text-sm font-poppins text-slate-600 sm:w-1/2 lg:w-11/12 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.5s"
                >
                    Mit der Webdesign Suite erhältst du eine moderne und maßgeschneiderte Website, die perfekt zu deiner Marke,
                    deinen Inhalten und deinen geschäftlichen Zielen passt. Wir übernehmen die gesamte Umsetzung. Von der ersten
                    Struktur bis zum finalen Go-Live.
                </p>

                <!-- PARAGRAPH 2 -->
                <p
                    class="mt-4 text-sm font-poppins text-slate-600 sm:w-1/2 lg:w-11/12 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.6s"
                >
                    Gemeinsam erstellen wir eine klare Seitenarchitektur, schreiben überzeugende Texte und entwickeln ein Design,
                    das deine Identität widerspiegelt. Bestehende Inhalte integrieren oder überarbeiten wir bei Bedarf nahtlos.
                </p>

                <!-- PARAGRAPH 3 -->
                <p
                    class="mt-4 text-sm font-poppins text-slate-600 sm:w-1/2 lg:w-11/12 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.7s"
                >
                    In nur <span class="font-semibold text-primary">2–5 Wochen</span> ist deine Website bereit.
                    Technisch sauber, optisch stark und optimiert, um aus Besuchern zufriedene Kunden zu machen.
                </p>

            </div>
        </div>
    </div>
</section>

