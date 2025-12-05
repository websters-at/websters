<?php

use Livewire\Volt\Component;

new class extends Component {

};
?>
<section
    class="relative pt-24 pb-16 lg:pt-40 lg:pb-28 overflow-hidden"
    x-data="{ show: false }"
    x-intersect="show = true"
>
    <!-- Background Grid -->
    <div class="absolute inset-0 opacity-[0.2] z-[-1]"
         style="
            background-image:
                linear-gradient(#4bc8e7 1px, transparent 1px),
                linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
            background-size: 50px 50px;">
    </div>

    <!-- Bottom fade -->
    <div
        class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 md:h-32
        bg-gradient-to-t from-white to-transparent pointer-events-none z-[-1]"
    ></div>

    <!-- OUTER CONTAINER -->
    <div class="max-w-7xl mx-auto px-4 xl:px-4 z-[1000]">

        <!-- INNER CENTERED CONTAINER -->
        <div class="max-w-5xl mx-auto">
            <!-- FLEX LAYOUT -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-10 lg:gap-14">

                <!-- TEXT COLUMN -->
                <div class="w-full lg:w-[52%]">
                    <h1
                        class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text
                               text-3xl lg:text-5xl font-bold font-poppins text-transparent
                               mt-8 lg:mt-9 lg:leading-tight fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.1s"
                    >
                        Unsere Leistungen.<br>
                        Stöbere dich durch unser Angebot.
                    </h1>

                    <p
                        class="text-sm lg:text-base font-poppins font-medium text-brand-dark
                               leading-normal lg:leading-normal mt-4 fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.2s"
                    >
                        Ob Webdesign, Individualsoftware oder Branding – wir bündeln alle Leistungen.
                        So sparst du Zeit und Aufwand, denn wir übernehmen dein komplettes Projekt aus einer Hand.
                    </p>

                    <!-- BUTTONS -->
                    <div
                        class="mt-4 flex flex-wrap items-center gap-3 lg:mt-5 fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.3s"
                    >
                        <a wire:navigate href="{{ route('webdesign') }}"
                           class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">
                            Webdesign
                        </a>

                        <a href="#contact"
                           class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">
                            Schreibe uns
                        </a>
                    </div>
                </div>

                <!-- IMAGE / SVG COLUMN -->
                <div
                    class="w-[80%] lg:w-[48%] fade-up rocket-float"
                    :class="{ 'show': show }"
                    style="transition-delay:.3s"
                >
                    <img
                        src="{{ asset('assets/services-hero.svg') }}"
                        alt="Services Hero"
                        class="w-full max-w-md mx-auto lg:mx-0"
                    >
                </div>

            </div>
        </div>

    </div>
</section>
