<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section class="pt-12 lg:pt-16 pb-12 lg:pb-16">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div
            class="relative flex flex-col items-center rounded-2xl bg-gradient-to-b from-primary/30 via-white/60 to-secondary/30 px-4 pb-4 pt-16 lg:rounded-[3rem] lg:pb-16 lg:pt-24"
        >


            <div
                class="mx-auto mt-6 text-center text-2xl font-semibold text-brand-dark font-poppins font-bold sm:w-1/2 md:w-2/5 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-1/3"
            >
                Lust auf Angebote? <br> Trage dich ein
            </div>
            <div
                class="mt-6 flex w-full flex-col gap-y-2 sm:w-1/2 md:w-2/5 lg:mt-9 lg:flex-row lg:items-center lg:gap-x-4 lg:gap-y-0 xl:w-2/5"
            >
                <div class="flex w-full flex-col">
                    <div
                        class="group relative rounded-xl border border-neutral-200 bg-white transition-all hover:bg-neutral-50"
                    >
                        <x-input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Email Adresse"
                        />
                    </div>
                </div>
                <x-button
                    class="items-center justify-center whitespace-nowrap text-sm font-medium font-poppins bg-primary text-white px-5 py-2 rounded-xl flex self-end"
                    type="submit"
                    label="Senden"
                />
            </div>
        </div>
    </div>
</section>
