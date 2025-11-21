<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>
<section class="mt-12 lg:mt-16 bg-slate-50 py-8 md:py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <!-- Text section above logos -->
        <div class="mb-8 lg:mb-16 text-left lg:text-center">
            <h2 class="text-xl lg:text-3xl font-poppins font-semibold bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text mb-4">
                Unsere Haupttechnologien
            </h2>
            <p class="text-sm lg:text-base font-poppins text-slate-600 max-w-2xl lg:mx-auto">
                Wir setzen auf moderne Technologien und Frameworks, um skalierbare, performante und zukunftssichere
                Lösungen für unsere Kunden zu entwickeln.
            </p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-12 lg:gap-x-20">
            <img class="h-8 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                 src="{{ asset('/assets/brand-logos/laravel.png') }}" alt="Laravel"/>
            <img class="h-8 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                 src="{{ asset('/assets/brand-logos/livewire.svg') }}" alt="Livewire"/>
            <img class="h-8 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                 src="{{ asset('/assets/brand-logos/nextjs.svg') }}" alt="NextJS"/>
            <img class="h-8 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                 src="{{ asset('/assets/brand-logos/python.png') }}" alt="Python"/>
            <img class="h-8 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                 src="{{ asset('/assets/brand-logos/react.png') }}" alt="React"/>
            <img class="h-8 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                 src="{{ asset('/assets/brand-logos/wordpress.svg') }}" alt="WordPress"/>
        </div>

        <div class="mt-6 lg:mt-12 text-left lg:text-center">
            <p class="text-xs lg:text-sm font-poppins text-slate-500 max-w-3xl lg:mx-auto">
                Von Backend-Entwicklung mit Laravel und Python bis zu Frontend-Lösungen mit React und NextJS –
                wir finden die passende Technologie für Ihr Projekt.
            </p>
        </div>
    </div>
</section>
