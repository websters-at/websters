<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>


<section class="lg:pt-24 pt-8 pb-12 lg:pb-16" id="team">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div
            class="flex flex-col items-start sm:items-center sm:text-center md:px-4 lg:items-start lg:px-8 lg:text-left xl:px-32"
        >
            <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs
                sm:px-3 sm:py-1.5 sm:text-sm">Team
            </div>

            <h2 class="text-xl lg:text-3xl font-poppins font-semibold bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text mt-6">
                Das Team
            </h2>
            <p class="mt-4 text-sm font-poppins font-medium text-shadow-slate-600 sm:w-1/2 lg:w-2/5">
                Unser Antrieb: Einzigartige Köpfe, die im Miteinander Großes bewegen. Gemeinsam setzen wir Maßstäbe.
            </p>
        </div>
        <div class="mt-4 border-b border-b-neutral-100 lg:mt-6"></div>
        <div
            class="mt-6 grid grid-cols-1 gap-x-2 gap-y-6 md:mx-auto md:w-5/6 md:px-4 lg:mx-0 lg:mt-12 lg:w-full lg:grid-cols-3 lg:gap-x-4 lg:gap-y-12 lg:px-8 xl:px-32"
        >
            <article class="flex flex-col">
                <figure
                    class="w-full aspect-square rounded-2xl lg:rounded-3xl lg:shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)] overflow-hidden"
                >
                    <img
                        class="h-full w-full rounded-2xl object-cover lg:rounded-3xl"
                        src="{{asset('/assets/people/stevan.png')}}"
                        alt="Stevan V. - Chief Executive Officer"
                    />
                </figure>
                <div class="flex flex-col items-start p-2 lg:px-0 lg:pb-0 lg:pt-4">
                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">
                        Stevan V.
                    </div>
                    <p class="mt-1 hidden font-medium text-neutral-500 lg:block">
                        Design, UI/UX, Webentwicklung, Software Engineer
                    </p>
                    <p class="mt-0.5 text-sm font-medium text-neutral-500 lg:hidden">
                        Design, UI/UX, Webentwicklung, Software Engineer
                    </p>
                    <div class="mt-3 flex flex-wrap items-center gap-2 lg:mt-4">
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://github.com/stevan06v"
                            title="Github"
                            target="_blank"
                        >
                            <x-icon name="fab.github"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.linkedin.com/in/stevan-vlajic-a7b433347/"
                            title="Linkedin"
                            target="_blank"
                        >
                            <x-icon name="fab.linkedin-in"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.instagram.com/stevan._v/"
                            title="Instagram"
                            target="_blank"
                        >
                            <x-icon name="fab.instagram"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://homelab.stevan.sexidude.com"
                            title="Website"
                            target="_blank"
                        >
                            <x-icon name="fas.globe"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                    </div>
                </div>
            </article>
            <article class="flex flex-col">
                <figure
                    class="w-full aspect-square rounded-2xl lg:rounded-3xl lg:shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)] overflow-hidden"
                >
                    <img
                        class="h-full w-full rounded-2xl object-cover lg:rounded-3xl"
                        src="{{asset('/assets/people/michi.png')}}"
                        alt="Michi - Chief Technology Officer"
                    />
                </figure>
                <div class="flex flex-col items-start p-2 lg:px-0 lg:pb-0 lg:pt-4">
                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">
                        Michael R.
                    </div>
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
                            title="Github"
                            target="_blank"
                        >
                            <x-icon name="fab.github"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.instagram.com/michi4r/"
                            title="Instagram"
                            target="_blank"
                        >
                            <x-icon name="fab.instagram"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://michi.is-a.dev/"
                            title="Website"
                            target="_blank"
                        >
                            <x-icon name="fas.globe"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                    </div>
                </div>
            </article>
            <article class="flex flex-col">
                <figure
                    class="w-full aspect-square rounded-2xl lg:rounded-3xl lg:shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)] overflow-hidden"
                >
                    <img
                        class="h-full w-full rounded-2xl object-cover lg:rounded-3xl"
                        src="{{asset('/assets/people/manuel.jpeg')}}"
                        alt="Emily Thompson - Chief Technology Officer"
                    />
                </figure>
                <div class="flex flex-col items-start p-2 lg:px-0 lg:pb-0 lg:pt-4">
                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">
                        Manuel P.
                    </div>
                    <p class="mt-1 hidden font-medium text-neutral-500 lg:block">
                        Webentwicklung, Software Engineer, Dev-Ops Engineer
                    </p>
                    <p class="mt-0.5 text-sm font-medium text-neutral-500 lg:hidden">
                        Webdevelopement, Software Engineer, Dev-Ops Engineer

                    </p>
                    <div class="mt-3 flex flex-wrap items-center gap-2 lg:mt-4">
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="#"
                            title="Github"
                            target="_blank"
                        >
                            <x-icon name="fab.github"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.linkedin.com/in/manuel-puchner-66a449232/"
                            title="Linkedin"
                            target="_blank"
                        >
                            <x-icon name="fab.linkedin-in"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://www.instagram.com/manuel.pchnr/"
                            title="Instagram"
                            target="_blank"
                        >
                            <x-icon name="fab.instagram"  class="h-4 text-brand-dark opacity-60" />
                        </a>
                        <a
                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-200 p-2 lg:h-10 lg:w-10 lg:p-3"
                            href="https://manuelpuchner.duckdns.org"
                            title="Website"
                            target="_blank"
                        >
                            <x-icon name="fas.globe"  class="h-4 text-brand-dark opacity-60" />

                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
