<section
    class="lg:pt-24 pt-8 pb-12 lg:pb-16"
    id="team"
    x-data="{ show: false }"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <!-- Header -->
        <div
            class="flex flex-col items-start sm:items-center sm:text-center md:px-4 lg:items-start lg:px-8 lg:text-left xl:px-32 fade-up"
            :class="{ 'show': show }"
        >
            <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm">
                Das Team
            </div>

            <h1 class="text-xl lg:text-3xl font-poppins font-bold bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text mt-6">
                Das Websters Team - Webentwicklung Linz
            </h1>

            <p class="mt-4 text-sm font-poppins font-medium text-shadow-slate-600 sm:w-1/2 lg:w-2/5">
                Unser Antrieb: Einzigartige Köpfe, die im Miteinander Großes bewegen. Gemeinsam setzen wir Maßstäbe in Webdesign & Softwareentwicklung.
            </p>
        </div>

        <div class="mt-4 border-b border-b-neutral-100 lg:mt-6"></div>

        <!-- Team Grid -->
        <div
            class="mt-6 grid grid-cols-1 gap-x-2 gap-y-6 md:mx-auto md:w-5/6 md:px-4 lg:mx-0 lg:mt-12 lg:w-full lg:grid-cols-3 lg:gap-x-4 lg:gap-y-12 lg:px-8 xl:px-32"
        >

            <!-- CARD 1 — STEVAN -->
            <article class="flex flex-col fade-up" style="transition-delay:.1s" :class="{ 'show': show }">
                <figure class="team-img-wrapper w-full aspect-square rounded-2xl lg:rounded-3xl overflow-hidden">
                    <img
                        class="h-full w-full object-cover rounded-2xl lg:rounded-3xl"
                        src="{{asset('/assets/people/stevan.png')}}"
                        alt="Stevan Vlajic - Webdeveloper & Software Engineer"
                        title="Stevan Vlajic - Webdeveloper & Software Engineer"
                        loading="lazy"
                    />
                </figure>

                <div class="flex flex-col items-start p-2 lg:px-0 lg:pt-4">

                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">Stevan V.</div>

                    <p class="mt-1 hidden font-medium text-neutral-500 lg:block">
                        Design, UI/UX, Webentwicklung, Software Engineer
                    </p>
                    <p class="mt-0.5 text-sm font-medium text-neutral-500 lg:hidden">
                        Design, UI/UX, Webentwicklung, Software Engineer
                    </p>

                    <!-- Social Links -->
                    <div class="mt-3 flex flex-wrap items-center gap-2 lg:mt-4">
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://github.com/stevan06v"
                            title="Stevan V. GitHub Profile - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.github"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.linkedin.com/in/stevan-vlajic-a7b433347/"
                            title="Stevan V. LinkedIn Profile - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.linkedin-in"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.instagram.com/stevan._v/"
                            title="Stevan V. Instagram - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.instagram"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://homelab.stevan.sexidude.com"
                            title="Stevan V. Persönliche Website - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fas.globe"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                    </div>

                </div>
            </article>

            <!-- CARD 2 — MICHI -->
            <article class="flex flex-col fade-up" style="transition-delay:.2s" :class="{ 'show': show }">
                <figure class="team-img-wrapper w-full aspect-square rounded-2xl lg:rounded-3xl overflow-hidden">
                    <img
                        class="h-full w-full object-cover rounded-2xl lg:rounded-3xl"
                        src="{{asset('/assets/people/michi.png')}}"
                        alt="Michael R. - DevOps Engineer & Cloud Architect"
                        title="Michael Ruep - DevOps Engineer & Cloud Architect"
                        loading="lazy"
                    />
                </figure>

                <div class="flex flex-col items-start p-2 lg:px-0 lg:pt-4">

                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">Michael R.</div>

                    <p class="mt-1 hidden font-medium text-neutral-500 lg:block">
                        Dev-Ops Engineer, Software Engineer, Cloud Architect
                    </p>
                    <p class="mt-0.5 text-sm font-medium text-neutral-500 lg:hidden">
                        Dev-Ops Engineer, Software Engineer, Cloud Architect
                    </p>

                    <div class="mt-3 flex flex-wrap items-center gap-2 lg:mt-4">
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://github.com/michi4"
                            title="Michael R. GitHub Profile - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                            itemprop="sameAs"
                        >
                            <x-icon name="fab.github"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="#"
                            title="Michael R. LinkedIn Profile - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.linkedin-in"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://michi.is-a.dev/"
                            title="Michael R. Persönliche Website - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fas.globe"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                    </div>

                </div>
            </article>

            <!-- CARD 3 — MANUEL -->
            <article class="flex flex-col fade-up" style="transition-delay:.3s" :class="{ 'show': show }">
                <figure class="team-img-wrapper w-full aspect-square rounded-2xl lg:rounded-3xl overflow-hidden">
                    <img
                        class="h-full w-full object-cover rounded-2xl lg:rounded-3xl"
                        src="{{asset('/assets/people/manuel.png')}}"
                        alt="Manuel Puchner - Webentwickler & DevOps Engineer"
                        title="Manuel Puchner - Webentwickler & DevOps Engineer"
                        loading="lazy"
                    />
                </figure>

                <div class="flex flex-col items-start p-2 lg:px-0 lg:pt-4">

                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">Manuel P.</div>

                    <p class="mt-1 hidden font-medium text-neutral-500 lg:block">
                        Webentwicklung, Software Engineer, Dev-Ops Engineer
                    </p>
                    <p class="mt-0.5 text-sm font-medium text-neutral-500 lg:hidden">
                        Webentwicklung, Software Engineer, Dev-Ops Engineer
                    </p>

                    <div class="mt-3 flex flex-wrap items-center gap-2 lg:mt-4">
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://github.com/ManuelPuchner"
                            title="Manuel P. GitHub Profile - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.github"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.linkedin.com/in/manuel-puchner-66a449232/"
                            title="Manuel P. LinkedIn Profile - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.linkedin-in"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.instagram.com/manuel.pchnr/"
                            title="Manuel P. Instagram - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fab.instagram"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://manuelpuchner.duckdns.org"
                            title="Manuel P. Persönliche Website - Websters Linz"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <x-icon name="fas.globe"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                    </div>


                </div>
            </article>

        </div>
    </div>
</section>
