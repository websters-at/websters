<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>
<section
    class="pt-16 mb-8 lg:mb-4 lg:pt-20 relative"
    id="about"
    x-data="{ show: false }"
    x-intersect="show = true"
>

    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="grid gap-y-8 md:px-4 lg:grid-cols-2 lg:items-center lg:gap-x-12 lg:gap-y-0 lg:px-8">

            <!-- Image Container -->
            <div
                class="relative order-1 lg:order-2 fade-up"
                :class="{ 'show': show }"
                style="transition-delay: .1s"
            >
                <img
                    class="h-64 w-full rounded-3xl object-cover object-center lg:h-full"
                    src="{{ asset('/assets/about.png') }}"
                    alt="Features"
                />
                <img
                    src="{{ asset('/assets/rocket.png') }}"
                    alt="Rocket"
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
           pointer-events-none rocket-float fade-up
           w-[300px] md:w-[360px] lg:w-[360px] xl:w-[500px]"
                    :class="{ 'show': show }"
                    style="transition-delay: .2s"
                />
            </div>

            <!-- Text Content -->
            <div class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left order-2 lg:order-1">

                <div
                    class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay: .15s"
                >
                    Websters - Wer?
                </div>

                <div
                    class="mt-8 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-2xl font-poppins font-bold text-transparent sm:w-4/5 md:w-3/5 lg:mt-9 lg:w-11/12 lg:text-4xl lg:leading-tight xl:w-3/4 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay: .25s"
                >
                    Arbeite mit unserem engagierten Entwicklerteam
                </div>

                <p
                    class="mt-4 text-sm font-poppins text-slate-600 sm:w-1/2 lg:w-11/12 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay: .35s"
                >
                    Bei Websters erwartet dich ein junges, dynamisches Team aus drei HTL-absolventen.
                    Wir entwickeln moderne Websites, Blogs, Online-Shops sowie individuelle Softwarelösungen und
                    übernehmen auch das komplette Design. Zusammen bringen wir dein digitales Projekt auf das nächste Level.
                </p>

                <a
                    href="/#contact"
                    class="btn-fancy text-sm font-medium font-poppins bg-primary text-white px-5 py-3 rounded-xl mt-8 flex items-center justify-center whitespace-nowrap lg:mt-9 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay: .45s"
                >
                    Schreibe uns
                </a>
            </div>

        </div>
    </div>

</section>
