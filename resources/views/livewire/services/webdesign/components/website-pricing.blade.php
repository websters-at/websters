<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section class="relative lg:pt-24 pt-8 pb-12 lg:pb-16 overflow-hidden" id="website-pricing">

    <!-- Unique Background -->
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute top-20 left-0 w-[28rem] h-[28rem] bg-white/40 blur-[140px] rounded-full"></div>
        <div class="absolute bottom-10 right-0 w-[26rem] h-[26rem] bg-neutral-200/40 blur-[150px] rounded-full"></div>

        <div class="absolute inset-0 opacity-[0.06]"
             style="
                background-image:
                    linear-gradient(#ec65ba 1px, transparent 1px),
                    linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                background-size: 50px 50px;">
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-white to-transparent"></div>
    </div>


    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <!-- SAME GRID PADDING AS BOXES -->
        <div class="md:px-4 lg:px-8">

            <!-- BADGE ALIGNED TO BOXES -->
            <div class="flex justify-start mb-8 lg:mb-12">
                <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white
                    badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs
                    sm:px-3 sm:py-1.5 sm:text-sm">
                    Preisgestaltung
                </div>
            </div>

            <!-- PRICING GRID -->
            <div class="grid w-full gap-y-8 lg:grid-cols-3 lg:gap-x-6 lg:gap-y-0 xl:gap-x-10">

                <!-- STARTER -->
                <div class="flex flex-col rounded-3xl border border-neutral-200 bg-white/60 backdrop-blur-xl p-6 shadow-[0_2px_10px_rgba(0,0,0,0.06)]">

                    <div>
                        <div class="text-lg font-poppins font-semibold text-neutral-800">Website Starter</div>
                        <p class="mt-3 text-sm font-poppins text-neutral-500">
                            Ideal für kleine Unternehmen und schnelle Online-Präsenz.
                        </p>

                        <div class="mt-6 flex items-end gap-x-2">
                            <div class="text-4xl font-poppins font-semibold text-[#002a42]">€990</div>
                        </div>

                        <ul class="mt-6 flex flex-col gap-y-2">
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-[#002a42]" />
                                <p class="text-sm font-poppins text-neutral-600">1–3 Unterseiten</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-[#002a42]" />
                                <p class="text-sm font-poppins text-neutral-600">Responsives Design</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-[#002a42]" />
                                <p class="text-sm font-poppins text-neutral-600">Kontaktformular</p>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-auto pt-6">
                        <x-button
                            link="#"
                            class="btn-fancy items-center justify-center whitespace-nowrap btn btn-sm lg:btn-md btn-primary w-full"
                            label="Anfragen"
                        />
                    </div>
                </div>

                <!-- COMPLETE -->
                <div class="flex flex-col rounded-3xl border border-primary/40 bg-white/70 backdrop-blur-xl
                            shadow-[0_0_20px_rgba(76,200,231,0.15)] p-6 lg:scale-[1.03]">

                    <div>
                        <div class="flex items-center gap-x-3">
                            <div class="text-lg font-poppins font-semibold text-neutral-800">Website Komplett</div>
                            <div class="inline-flex items-center justify-center rounded-full bg-primary text-white px-2 py-0.5 text-xs font-medium">
                                Beliebt
                            </div>
                        </div>

                        <p class="mt-3 text-sm font-poppins text-neutral-500">
                            Die perfekte All-in-One Lösung für wachsende Unternehmen.
                        </p>

                        <div class="mt-6 flex items-end gap-x-2">
                            <div class="text-4xl font-poppins font-semibold text-[#002a42]">€1990</div>
                        </div>

                        <ul class="mt-6 flex flex-col gap-y-2">
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-primary" />
                                <p class="text-sm font-poppins text-neutral-600">Bis zu 8 Seiten</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-primary" />
                                <p class="text-sm font-poppins text-neutral-600">Professionelles Copywriting</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-primary" />
                                <p class="text-sm font-poppins text-neutral-600">SEO-Optimierung</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-primary" />
                                <p class="text-sm font-poppins text-neutral-600">Launch in 5 Wochen</p>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-auto pt-6">
                        <x-button
                            link="#"
                            class="btn-fancy items-center justify-center whitespace-nowrap btn btn-sm lg:btn-md btn-primary w-full"
                            label="Anfragen"
                        />
                    </div>
                </div>

                <!-- PREMIUM -->
                <div class="flex flex-col rounded-3xl border border-neutral-200 bg-white/60 backdrop-blur-xl p-6 shadow-[0_2px_10px_rgba(0,0,0,0.06)]">

                    <div>
                        <div class="text-lg font-poppins font-semibold text-neutral-800">Website Premium</div>
                        <p class="mt-3 text-sm font-poppins text-neutral-500">
                            Für Unternehmen, die maximale Performance wollen.
                        </p>

                        <div class="mt-6 flex items-end gap-x-2">
                            <div class="text-4xl font-poppins font-semibold text-[#002a42]">€2990</div>
                        </div>

                        <ul class="mt-6 flex flex-col gap-y-2">
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-[#002a42]" />
                                <p class="text-sm font-poppins text-neutral-600">Unbegrenzte Seiten</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-[#002a42]" />
                                <p class="text-sm font-poppins text-neutral-600">Premium Design</p>
                            </li>
                            <li class="flex items-center gap-x-3">
                                <x-icon name="o-check-circle" class="h-5 text-[#002a42]" />
                                <p class="text-sm font-poppins text-neutral-600">Individuelle Software-Features</p>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-auto pt-6">
                        <x-button
                            link="#"
                            class="btn-fancy items-center justify-center whitespace-nowrap btn btn-sm lg:btn-md btn-primary w-full"
                            label="Anfragen"
                        />
                    </div>
                </div>

            </div>

        </div> <!-- closes grid-padding wrapper -->

    </div>
</section>
