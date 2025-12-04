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
    <div class="absolute inset-0 opacity-[0.2] z-[-1]"
         style="
                background-image:
                    linear-gradient(#4bc8e7 1px, transparent 1px),
                    linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                background-size: 50px 50px;">
    </div>

    <!-- Bottom gradient fade to next section -->
    <div
        class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 md:h-32
        bg-gradient-to-t from-white to-transparent pointer-events-none z-[-1]"
    ></div>

    <div class="max-w-7xl mx-auto px-4 xl:px-4 flex flex-col items-start z-[1000]">

        <div
            class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold font-poppins text-transparent
            lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.1s"
        >
            Clean, modern, überzeugend. Dein neuer Webauftritt?
        </div>

        <p
            class="text-sm font-poppins font-medium text-brand-dark leading-normal lg:leading-normal lg:text-base mt-4
            sm:w-2/3 md:w-1/2 xl:w-2/5 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.2s"
        >
            Hier erfährst du alles, was du über unseren Webdesign-Service wissen musst. Wir erklären dir transparent und verständlich, wie wir arbeiten und was du von uns erwarten kannst.
        </p>

        <div
            class="mt-4 flex flex-wrap items-center justify-center gap-3 lg:mt-5 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.3s"
        >
            <a href="#website" class="btn btn-sm lg:btn-md btn-primary mt-4 btn-fancy text-white">Mehr Infos</a>
            <a href="#website-pricing" class="btn btn-sm btn-neutral lg:btn-md mt-4 btn-fancy text-white">Preise</a>
        </div>

    </div>
</section>
