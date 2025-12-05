<section
    class="mt-12 lg:mt-16 bg-slate-50 py-8 md:py-12 lg:py-16"
    x-data="{
        show: false,
        logos: [
            { src: '{{ asset('/assets/brand-logos/laravel.png') }}', alt: 'Laravel', title: 'Laravel',   href: 'https://laravel.com/' },
            { src: '{{ asset('/assets/brand-logos/livewire.svg') }}',   alt: 'Livewire', title: 'Livewire',   href: 'https://laravel-livewire.com/' },
            { src: '{{ asset('/assets/brand-logos/nextjs.svg') }}',     alt: 'NextJS',   title: 'NextJS',  href: 'https://nextjs.org/' },
            { src: '{{ asset('/assets/brand-logos/python.png') }}',     alt: 'Python',  title: 'Python',   href: 'https://www.python.org/' },
            { src: '{{ asset('/assets/brand-logos/tailwind.png') }}',   alt: 'Tailwind', title: 'Tailwind v4',   href: 'https://tailwindcss.com/' },
            { src: '{{ asset('/assets/brand-logos/react.png') }}',      alt: 'React',  title: 'React',   href: 'https://react.dev/' },
            { src: '{{ asset('/assets/brand-logos/mysql.png') }}',      alt: 'MySQL',   title: 'MySQL',   href: 'https://www.mysql.com/' },
            { src: '{{ asset('/assets/brand-logos/wordpress.svg') }}',  alt: 'WordPress', title: 'WordPress',  href: 'https://wordpress.org/' },
            { src: '{{ asset('/assets/brand-logos/docker.png') }}',     alt: 'Docker',  title: 'Docker',   href: 'https://www.docker.com/' },
            { src: '{{ asset('/assets/brand-logos/kubernetes.png') }}', alt: 'Kubernetes', title: 'Kubernetes',  href: 'https://kubernetes.io/' },
            { src: '{{ asset('/assets/brand-logos/postgres.png') }}',   alt: 'Postgres', title: 'Postgres',   href: 'https://www.postgresql.org/' },
        ],
        initMarquee() {
                const marqueeContent = this.$el.querySelector('.marquee-content');
                if (!marqueeContent) return;

                const containerWidth = this.$el.offsetWidth;
                let totalWidth = marqueeContent.scrollWidth;

                let i = 0;

                while (totalWidth < containerWidth * 2) {
                    const clone = marqueeContent.children[i].cloneNode(true);
                    marqueeContent.appendChild(clone);
                    totalWidth = marqueeContent.scrollWidth;
                    i++;

                    if (i > 20) break;
                }
            }
    }"
    x-init="initMarquee()"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <!-- Heading -->
        <div class="mb-8 lg:mb-16 text-left lg:text-center fade-up" :class="{ 'show': show }">
            <h1 class="text-xl lg:text-3xl font-poppins font-bold bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text mb-4">
                Unsere Haupttechnologien
            </h1>
            <p class="text-sm lg:text-base font-poppins text-slate-600 max-w-2xl lg:mx-auto">
                Wir setzen auf moderne Technologien und Frameworks, um skalierbare, performante und zukunftssichere
                Lösungen für unsere Kunden zu entwickeln.
            </p>
        </div>

        <!-- Marquee -->
        <div class="relative w-full h-32 overflow-hidden fade-up" :class="{ 'show': show }" style="transition-delay: .15s">
            <!-- Fade edges -->
            <div
                class="pointer-events-none absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-slate-50 to-transparent z-10">
            </div>
            <div
                class="pointer-events-none absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-slate-50 to-transparent z-10">
            </div>

            <!-- Scrolling content -->
            <ul class="marquee-content flex items-center h-full w-max gap-8 lg:gap-12">
                <template x-for="(logo, index) in logos" :key="index">
                    <li class="flex-shrink-0 h-full flex items-center justify-center">
                        <a :href="logo.href" target="_blank" rel="noopener noreferrer">
                            <img
                                class="h-12 lg:h-14 transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer"
                                :src="logo.src"
                                :alt="logo.alt"
                                :title="logo.title"
                            />
                        </a>
                    </li>
                </template>
            </ul>
        </div>

        <!-- Bottom text -->
        <div class="mt-6 lg:mt-12 text-left lg:text-center fade-up" :class="{ 'show': show }" style="transition-delay: .3s">
            <p class="text-xs lg:text-sm font-poppins text-slate-500 max-w-3xl lg:mx-auto">
                Egal ob Backend mit Laravel und Python oder Frontend mit React und Next.js – wir entwickeln und
                kombinieren die Technologien so, dass dein Projekt stabil läuft, gut aussieht und einfach skalierbar
                bleibt.
            </p>
        </div>
    </div>
</section>
