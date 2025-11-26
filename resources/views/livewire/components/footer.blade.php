<?php

use Carbon\Carbon;
use Livewire\Volt\Component;

new class extends Component {
    public $currentYear;

    public function mount(): void
    {
        $this->currentYear = Carbon::now()->format('Y');

    }

}; ?>

<footer class="bg-slate-100 py-4 lg:py-6">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div
            class="grid gap-y-4 lg:grid-cols-[1fr_auto_1fr] lg:items-center lg:gap-x-12 lg:gap-y-0"
        >
            <div
                class="text-center text-sm font-poppins font-medium text-neutral-700 lg:text-left"
            >
                <time>{{$currentYear}}</time>
                - <strong> Websters </strong> All rights reserved.
            </div>
            <div class="flex flex-wrap items-center justify-center gap-3 lg:gap-6">
                <a
                    class="relative whitespace-nowrap text-sm font-poppins font-medium text-slate-500 before:bg-slate-300"
                    href="{{ route('imprint') }}"
                    wire:navigate
                    title="Impressum"
                >Impressum</a>
                <span class="h-3 border-l border-l-neutral-300"></span>

                <a
                    class="whitespace-nowrap text-sm font-poppins font-medium text-slate-500"
                    href="{{ route('data-privacy') }}"
                    wire:navigate
                    title="Datenschutz"
                >Datenschutz</a>
                <span class="h-3 border-l border-l-neutral-300"></span>

                <a
                    class="whitespace-nowrap text-sm font-poppins font-medium text-slate-500"
                    href="{{ route('terms') }}"
                    wire:navigate
                    title="Terms & Conditions"
                >AGBs</a>

            </div>
            <div
                class="flex flex-wrap items-center justify-center gap-4 lg:justify-self-end"
            >
                <a href="https://www.instagram.com/websters.at/" target="_blank">
                    <x-icon name="fab.instagram" class="text-shadow-slate-500 opacity-60 w-4.5"/>
                </a>
                <a href="https://github.com/websters-at" target="_blank">
                    <x-icon name="fab.github" class="text-shadow-slate-500 opacity-60 w-5"/>
                </a>

            </div>
        </div>
    </div>
</footer>

