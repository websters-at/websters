<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $email = "";

    public function save(): void
    {

    }

};?>


<div class="relative overflow-hidden">

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <!-- Large floating orbs - Responsive sizes -->
        <div class="absolute -top-10 -left-10 w-40 h-40 sm:w-60 sm:h-60 md:w-80 md:h-80 rounded-full bg-[#4bc8e7] opacity-20 animate-float-slow"></div>
        <div class="absolute top-1/4 right-1/4 w-32 h-32 sm:w-48 sm:h-48 md:w-64 md:h-64 rounded-full bg-[#4bc8e7] opacity-10 animate-float-fast"></div>


        <!-- Moving gradient waves - Adjusted for mobile -->
        <div class="absolute -bottom-10 -left-10 w-full h-20 sm:h-32 md:h-40 bg-gradient-to-r from-[#4bc8e7] to-[#ec65ba] opacity-10 rounded-full blur-lg sm:blur-xl animate-wave"></div>
        <div class="absolute -bottom-20 left-1/4 w-3/4 h-16 sm:h-24 md:h-32 bg-gradient-to-l from-[#ec65ba] to-[#4bc8e7] opacity-10 rounded-full blur-lg sm:blur-xl animate-wave-reverse"></div>

        <!-- Grid pattern overlay with low opacity -->
        <div class="absolute inset-0 opacity-3 sm:opacity-5"
             style="background-image: linear-gradient(#4bc8e7 1px, transparent 1px), linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                    background-size: 30px 30px; sm:background-size: 50px 50px;"></div>
    </div>

    <!-- Bottom gradient fade to blend with next section -->
    <div class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 md:h-32 bg-gradient-to-t from-white to-transparent -z-10"></div>

    <section class="pt-32 lg:pt-48 md:pt-40" id="home">
        <div
            class="max-w-6xl mx-auto px-4 xl:px-0
            flex flex-col
            items-start text-left
            md:items-center md:text-center"
        >
            <!-- Pill -->
            <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs
                sm:px-3 sm:py-1.5 sm:text-sm">Introducing Websters</div>

            <!-- Heading -->
            <div
                class="bg-gradient-to-r from-[#4bc8e7] via-[#ec65ba80] to-[#ec65ba]
                bg-clip-text text-3xl md:text-4xl lg:text-6xl xl:text-7xl font-poppins font-extrabold text-transparent
                mt-4 sm:mt-6 w-full max-w-xl sm:max-w-2xl lg:max-w-4xl
                leading-snug lg:mt-8 lg:leading-tight"
            >
                We Design To Inspire & Elevate Your Brand
            </div>

            <!-- Subcopy -->
            <p
                class="mt-4 sm:mt-6 font-poppins font-medium
                text-sm sm:text-sm md:text-base lg:text-lg text-gray-600
                w-full max-w-xl sm:max-w-2xl lg:max-w-3xl"
            >
                Gemeinsam bringen wir deine Marke voran – durch liebevolles Design und klare Softwarelösungen, damit du online sichtbar und erfolgreich bist.
            </p>

            <!-- Form + Button -->
            <div
                class="mt-6 sm:mt-8 flex w-full flex-col gap-y-3 sm:gap-y-4
                max-w-xl sm:max-w-2xl lg:max-w-3xl
                md:self-center
                lg:mt-12 lg:flex-row lg:items-center lg:gap-x-4 lg:gap-y-0"
            >
                <div class="flex w-full flex-col">
                    <x-input
                        class="shadow-none !outline-none !ring-0 focus:!ring-0 focus:!outline-none text-sm sm:text-base"
                        wire:model="email"
                        type="email"
                        placeholder="Deine Email"
                        icon="o-envelope"
                    />
                </div>

                <button wire:click="save" class="btn btn-sm sm:btn-md btn-primary">Loslegen</button>
            </div>
        </div>
    </section>
</div>
