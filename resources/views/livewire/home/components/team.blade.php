<?php
use Livewire\Volt\Component;

new class extends Component {

};?>
<section class="pt-12 lg:pt-16 relative pb-12 lg:pb-16">
    <img
        class="absolute left-0 top-0 -z-20 h-full w-full object-cover"
        src="https://tailkits.com/ui/iframe/assets/img/bg-overlay-3.png"
        alt="Background image"
    />
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div
            class="flex flex-col items-start sm:items-center sm:text-center md:px-4 lg:items-start lg:px-8 lg:text-left"
        >
            <div
                class="items-center justify-center rounded-full text-sm font-medium whitespace-nowrap shadow-[0_2px_10px_0px_rgba(0,0,0,0.15)] inline-flex bg-white text-neutral-700 px-2.5 py-1"
            >
                Das <Team></Team>
            </div>
            <div
                class="mt-8 bg-gradient-to-b from-slate-800 to-slate-600 bg-clip-text text-xl font-semibold text-transparent md:text-2xl lg:mt-9 lg:w-5/6 lg:leading-tight xl:w-3/4 xl:text-3xl"
            >
                Meet Our Exceptional Team
            </div>
            <p class="mt-4 text-sm font-medium text-slate-600 sm:w-1/2 lg:w-2/5">
                The dedicated individuals behind our success, working collaboratively to
                deliver outstanding results.
            </p>
        </div>
        <div class="mt-4 border-b border-b-neutral-100 lg:mt-6"></div>
        <div
            class="relative mt-6 grid gap-y-6 sm:mx-auto sm:w-2/3 md:w-1/2 md:px-4 lg:mt-9 lg:w-full lg:grid-cols-2 lg:gap-x-6 lg:gap-y-0 lg:px-8"
        >

            <article class="flex flex-col">
                <figure
                    class="w-full rounded-2xl lg:rounded-3xl lg:shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)]"
                >
                    <img
                        class="h-40 w-full rounded-2xl object-cover lg:h-64 lg:rounded-3xl"
                        src="https://tailkits.com/ui/iframe/assets/img/profile-2.png"
                        alt="Features image"
                    />
                </figure>
                <div class="flex flex-col items-start p-3 lg:p-4">
                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">
                        Emily Thompson
                    </div>
                    <p
                        class="mt-0.5 text-sm font-medium text-neutral-500 lg:mt-1 lg:text-base"
                    >
                        Chief Technology Officer
                    </p>
                </div>
            </article>
            <article class="flex flex-col">
                <figure
                    class="w-full rounded-2xl lg:rounded-3xl lg:shadow-[0_2px_10px_0px_rgba(0,0,0,0.05)]"
                >
                    <img
                        class="h-40 w-full rounded-2xl object-cover lg:h-64 lg:rounded-3xl"
                        src="https://tailkits.com/ui/iframe/assets/img/profile-3.png"
                        alt="Features image"
                    />
                </figure>
                <div class="flex flex-col items-start p-3 lg:p-4">
                    <div class="font-semibold text-neutral-700 md:text-lg lg:text-xl">
                        Sarah Roberts
                    </div>
                    <p
                        class="mt-0.5 text-sm font-medium text-neutral-500 lg:mt-1 lg:text-base"
                    >
                        Chief Marketing Officer
                    </p>
                </div>
            </article>
        </div>
    </div>
</section>

