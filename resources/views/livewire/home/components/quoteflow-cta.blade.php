<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>

<section class="lg:pt-16 pb-8 lg:pb-16">
    <div class="max-w-7xl mx-auto px-4 xl:px-0 flex flex-col items-start lg:items-center">
        <div
            class="mt-6 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-left lg:text-center text-2xl font-semibold text-transparent w-full lg:w-4/5 lg:mt-9 lg:text-4xl lg:leading-tight"
        >
            Preiseinblick erhalten mit
        </div>
        <div
            class="mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-full bg-gradient-to-r from-[#4bc8e7] via-[#ec65ba80] to-[#ec65ba] px-8 py-2"
        >
      <span
          class="text-white bg-gradient-to-b from-slate-800 to-slate-600 bg-clip-text text-2xl font-semibold text-transparent lg:py-1.5 lg:text-4xl"
      >
        quoteflow
      </span>
        </div>
        <p
            class="mt-2 text-left lg:text-center text-sm font-medium text-slate-600 w-full lg:w-2/5"
        >
            Wähle oben einen Service oder öffne unseren Angebotsbuilder, um einen transparenten Preis auf Projektbasis
            zu erhalten.
        </p>
        <x-button
            class="items-center justify-center whitespace-nowrap text-sm font-medium font-poppins bg-secondary text-white px-5 py-3 rounded-xl mt-4 flex lg:mt-4"
            link="#coming-soon"
        >
            Angebotsbuilder öffnen
        </x-button>
    </div>
</section>
