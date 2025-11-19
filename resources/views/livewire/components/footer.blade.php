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
                    class="whitespace-nowrap text-sm font-poppins font-medium text-slate-500"
                    href="#"
                    title="Terms of use"
                >Terms of use</a
                >
                <span class="h-3 border-l border-l-neutral-300"></span>
                <a
                    class="relative whitespace-nowrap text-sm font-poppins font-medium text-slate-500 before:bg-slate-300"
                    href="#"
                    title="Privacy policy"
                >Privacy policy</a
                >
                <span class="h-3 border-l border-l-neutral-300"></span>
                <a
                    class="whitespace-nowrap text-sm font-poppins font-medium text-slate-500"
                    href="#"
                    title=">Contact us"
                >Contact us</a
                >
            </div>
            <div
                class="flex flex-wrap items-center justify-center gap-4 lg:justify-self-end"
            >
                <a href="#" title="Instagram" target="_blank">
                    <x-bi-instagram />
                </a>
                <a href="#" title="Linkedin" target="_blank">
                    <x-bi-linkedin />
                </a>

            </div>
        </div>
    </div>
</footer>

