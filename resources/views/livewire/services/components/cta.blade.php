<?php

use Livewire\Volt\Component;

new class extends Component {

};
?>
<section class="relative py-20 lg:py-28 overflow-hidden">

    <!-- BACKGROUND BLURS -->
    <div class="absolute inset-0 -z-10 opacity-60 pointer-events-none">
        <div class="absolute top-10 left-1/3 w-96 h-96 bg-white/40 blur-[150px] rounded-full"></div>
        <div class="absolute top-1/2 right-1/4 w-80 h-80 bg-neutral-300/40 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-white/30 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4">

        <!-- CTA BOX -->
        <div
            class="bg-white/70 backdrop-blur-xl border border-slate-200 shadow-[0_10px_40px_rgba(0,0,0,0.05)]
                   rounded-3xl px-6 py-12 lg:px-12 flex flex-col items-center text-center fade-up"
        >

            <!-- BADGE -->
            <div
                class="inline-flex items-center justify-center rounded-full text-xs sm:text-sm font-poppins
                       font-medium bg-brand-dark text-white px-3 py-1 shadow-md"
            >
                Service Beratung
            </div>

            <!-- HEADLINE -->
            <h2
                class="mt-6 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-transparent
                       text-2xl lg:text-4xl font-poppins font-bold leading-snug"
            >
                Nicht sicher, welcher Service zu dir passt?
            </h2>

            <!-- SUBTEXT -->
            <p class="mt-4 text-sm lg:text-base text-slate-600 max-w-md">
                Wir helfen dir persönlich weiter und finden gemeinsam heraus,
                welche Lösung für dein Projekt am besten geeignet ist.
            </p>

            <!-- CTA BUTTON -->
            <a
                href="#contact"
                class="mt-8 btn btn-primary btn-lg text-white px-6 py-3 rounded-xl font-poppins flex items-center gap-2"
            >
                Jetzt Kontakt aufnehmen
                <i class="fa-solid fa-arrow-right text-sm"></i>
            </a>

        </div>

    </div>
</section>
