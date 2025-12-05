<?php

use Livewire\Volt\Component;

new class extends Component {

};
?>

@php
    $cards = [
        [
            'title' => 'Webentwicklung',
            'badge' => 'web',
            'badge_color' => 'bg-primary',
            'icon' => 'fas.paint-brush',
            'image' => 'https://tailkits.com/ui/iframe/assets/img/bg-linear-1.png',
            'alt' => 'Webdeisgn/entwicklung',
            'desc' => 'Auf der suche nach einer professionellen Unternehmenswebsite, Marketingseiten oder Webapplikationen? Dann ist dieses Paket genau das richtige für dich.',
            'button' => 'Mehr Erfahren',
            'btn_color' => 'btn-primary',
            'link' => route('webdesign'),
        ],
        [
            'title' => 'Individual Software',
            'badge' => 'custom',
            'badge_color' => 'bg-secondary',
            'icon' => 'fas.rocket',
            'image' => 'https://tailkits.com/ui/iframe/assets/img/bg-linear-4.png',
            'alt' => 'Custom Software',
            'desc' => 'Du bist ein Start-up ohne Entwicklungserfahrung oder benötigst eine individuell entwickelte Software für interne Abläufe? Dann passt dieses Paket perfekt zu dir.',
            'button' => 'Mehr Erfahren',
            'btn_color' => 'btn-secondary',
            'link' => route('software'),
        ],
        [
            'title' => 'IT-Consulting',
            'badge' => 'analysis',
            'badge_color' => 'bg-primary',
            'icon' => 'fas.chart-diagram',
            'image' => 'https://tailkits.com/ui/iframe/assets/img/bg-linear-3.png',
            'alt' => 'IT-Consulting',
            'desc' => 'Ineffiziente Prozesse? Fehlende Software-Infrastruktur? Wir helfen dir dabei deine Unternehmensprozesse zu analysieren und zu optimieren.',
            'button' => 'Mehr Erfahren',
            'btn_color' => 'btn-primary',
            'link' => route('consulting'),
        ],

    ];
@endphp


<section
    class="lg:pt-16 lg:mb-24"
    id="services"
    x-data="{ show: false }"
    x-intersect="show = true"
>

    <div class="max-w-7xl mx-auto px-4 xl:px-0 flex flex-col items-start lg:items-center">

        <!-- Section Badge -->
        <div
            class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.05s"
        >
            Leistungen Einblick
        </div>

        <!-- Section Heading -->
        <h1
            class="bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text font-poppins text-2xl font-bold text-transparent lg:text-5xl mt-6 text-left lg:text-center w-full lg:w-1/2 lg:leading-tight xl:mt-9 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.15s"
        >
            Unsere Dienstleistungen
        </h1>

        <!-- Subtext -->
        <p
            class="text-sm font-medium text-slate-600 leading-normal lg:text-base mt-4 text-left lg:text-center w-full lg:w-2/3 xl:w-2/5 fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.25s"
        >
            Von modernem Webdesign bis zu individueller Software – wir entwickeln maßgeschneiderte Lösungen für dein digitales Wachstum.
        </p>

        <!-- Cards -->
        <div class="mt-12 grid gap-y-4 w-full md:gap-y-6 md:px-4 lg:mt-16 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-0 lg:px-8">

            @foreach ($cards as $i => $card)
                <article
                    class="flex flex-col rounded-2xl border border-neutral-200 p-4 shadow-[0_2px_10px_rgba(0,0,0,0.05)] lg:justify-between lg:rounded-[2rem] lg:p-6 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.{{ 35 + $i * 10 }}s"
                >
                    <div>
                        <img
                            class="mb-4 h-40 w-full rounded-lg object-cover object-left-top lg:mb-6 lg:h-52 lg:rounded-2xl"
                            src="{{ $card['image'] }}"
                            alt="{{ $card['alt'] }}"
                        />

                        <x-icon
                            name="{{ $card['icon'] }}"
                            class="h-5 text-brand-dark opacity-60 lg:h-6"
                        />

                        <div class="mt-4 flex flex-wrap items-start gap-x-2 gap-y-1.5 lg:mt-6">
                            <div class="font-bold text-brand-dark">{{ $card['title'] }}</div>

                            <div class="rounded-full text-sm font-semibold text-white px-2 py-0.5 {{ $card['badge_color'] }}">
                                {{ $card['badge'] }}
                            </div>
                        </div>

                        <p class="mt-2 text-sm font-medium text-neutral-500">
                            {{ $card['desc'] }}
                        </p>
                    </div>

                    <x-button
                        link="{{ $card['link'] }}"
                        class="btn-fancy items-center justify-center whitespace-nowrap btn btn-sm text-white lg:btn-md mt-4 {{ $card['btn_color'] }}"
                        label="{{ $card['button'] }}"
                    />
                </article>
            @endforeach

        </div>
    </div>
</section>
