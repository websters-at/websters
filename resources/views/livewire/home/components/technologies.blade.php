<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section class="mt-12 lg:mt-16 bg-slate-50 py-8 md:py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="mb-8 lg:mb-16 text-left lg:text-center">
            <h2 class="text-xl lg:text-3xl font-poppins font-bold bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text mb-4">
                Unsere Haupttechnologien
            </h2>
            <p class="text-sm lg:text-base font-poppins text-slate-600 max-w-2xl lg:mx-auto">
                Wir setzen auf moderne Technologien und Frameworks, um skalierbare, performante und zukunftssichere
                Lösungen für unsere Kunden zu entwickeln.
            </p>
        </div>

        <div
            x-data="{
                logos: [
                    { src: '{{ asset('/assets/brand-logos/laravel.png') }}',     alt: 'Laravel',    href: 'https://laravel.com/' },
                    { src: '{{ asset('/assets/brand-logos/livewire.svg') }}',   alt: 'Livewire',   href: 'https://laravel-livewire.com/' },
                    { src: '{{ asset('/assets/brand-logos/nextjs.svg') }}',      alt: 'NextJS',     href: 'https://nextjs.org/' },
                    { src: '{{ asset('/assets/brand-logos/python.png') }}',      alt: 'Python',     href: 'https://www.python.org/' },
                    { src: '{{ asset('/assets/brand-logos/tailwind.png') }}',    alt: 'Tailwind',   href: 'https://tailwindcss.com/' },
                    { src: '{{ asset('/assets/brand-logos/react.png') }}',       alt: 'React',      href: 'https://react.dev/' },
                    { src: '{{ asset('/assets/brand-logos/mysql.png') }}',       alt: 'MySQL',      href: 'https://www.mysql.com/' },
                    { src: '{{ asset('/assets/brand-logos/wordpress.svg') }}',   alt: 'WordPress',  href: 'https://wordpress.org/' },
                    { src: '{{ asset('/assets/brand-logos/docker.png') }}',      alt: 'Docker',     href: 'https://www.docker.com/' },
                    { src: '{{ asset('/assets/brand-logos/kubernetes.png') }}',  alt: 'Kubernetes', href: 'https://kubernetes.io/' },
                    { src: '{{ asset('/assets/brand-logos/postgres.png') }}',    alt: 'Postgres',   href: 'https://www.postgresql.org/' },
                ],
                initMarquee() {
                    var marqueeContent = this.$el.querySelector('.marquee-content');
                    // Duplicate logos for seamless loop
                    for(var i = 0; i < 6; i++) {
                        var clone = marqueeContent.children[i].cloneNode(true);
                        marqueeContent.appendChild(clone);
                    }
                }
            }"
            class="relative w-full h-32 overflow-hidden"
            x-init="initMarquee()"
        >
            <!-- Fade edges -->
            <div
                class="pointer-events-none absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-slate-50 to-transparent z-10"></div>
            <div
                class="pointer-events-none absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-slate-50 to-transparent z-10"></div>

            <!-- Scrolling content -->
            <ul class="marquee-content flex items-center h-full w-max gap-8 lg:gap-12">
                <template x-for="(logo, index) in logos" :key="index">
                    <li class="flex-shrink-0 h-full flex items-center justify-center">
                        <a :href="logo.href" target="_blank" rel="noopener noreferrer">
                            <img
                                class="h-12 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                                :src="logo.src"
                                :alt="logo.alt"
                            />
                        </a>
                    </li>
                </template>
            </ul>
        </div>

        <div class="mt-6 lg:mt-12 text-left lg:text-center">
            <p class="text-xs lg:text-sm font-poppins text-slate-500 max-w-3xl lg:mx-auto">
                Egal ob Backend mit Laravel und Python oder Frontend mit React und Next.js – wir entwickeln und
                kombinieren die Technologien so, dass dein Projekt stabil läuft, gut aussieht und einfach skalierbar
                bleibt.
            </p>
        </div>
    </div>
</section>


