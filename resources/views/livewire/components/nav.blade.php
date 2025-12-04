<?php

use Livewire\Volt\Component;

new class extends Component {
    public bool $mobileMenuOpen = false;
    public int $rotation=0;
};

?>

<div
    x-data="{
        mobileMenuOpen: @entangle('mobileMenuOpen'),
        rotation: @entangle('rotation'),
        activeSection: null,
        homePath: '{{ parse_url(route('home'), PHP_URL_PATH) }}',

        init() {
            // Only care about hash underlines on the home page
            if (window.location.pathname === this.homePath) {
                this.setActiveFromHash();

                window.addEventListener('hashchange', () => {
                    this.setActiveFromHash();
                });
            }
        },

        setActiveFromHash() {
            const hash = window.location.hash ? window.location.hash.substring(1) : null;
            // Fallback: if no hash, you can choose a default, e.g. 'about'
            this.activeSection = hash || null;
        }
    }"
    class="fixed top-0 inset-x-0 z-50 bg-none"
>
    <livewire:components.upper-nav/>

    <header class="py-4">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div
                class="bg-white flex items-center justify-between gap-x-4
                rounded-2xl py-2.5 pl-5 pr-2.5
                shadow-[0_2px_10px_0px_rgba(0,0,0,0.15)]
                border-[1px] border-[#002a421a]
                lg:grid lg:grid-cols-[1fr_auto_1fr] lg:gap-x-12 lg:rounded-[1.375rem]"
            >
                {{-- LEFT LOGO --}}
                <div class="flex items-center gap-x-10">
                    <a
                        wire:navigate
                        href="{{ route('home') }}"
                        @click="activeSection = 'home'"
                        class="flex items-center"{{-- reset when going to plain / --}}
                    >
                        {{-- Desktop logo --}}
                        <img
                            class="h-7 hidden lg:block"
                            src="{{ asset('assets/websters-full-logo.png') }}"
                            alt="Logo"
                        />

                        {{-- Mobile logo (icon) --}}
                        <img
                            class="h-7 lg:hidden"
                            src="{{ asset('assets/websters-mobile.png') }}"
                            alt="Logo"
                        />
                    </a>
                </div>

                {{-- DESKTOP NAV --}}
                <nav class="hidden lg:block">
                    <ul class="flex items-center">
                        <li>
                            <a
                                wire:navigate
                                href="{{ route('home') }}"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                :class="{ 'underline-secondary': '{{ Route::currentRouteName() }}' === 'home' }"
                            >
                                Home
                            </a>
                        </li>

                        <li>
                            <a
                                wire:navigate
                                href="{{ route('projects') }}"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                wire:current="underline-secondary"
                            >
                                Projekte
                            </a>
                        </li>

                        <li>
                            <a
                                wire:navigate
                                href="{{ route('services') }}"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                wire:current="underline-secondary"
                            >
                                Leistungen
                            </a>
                        </li>

                        <li>
                            <a
                                wire:navigate
                                href="{{ route('about') }}"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                wire:current="underline-secondary"
                            >
                                About
                            </a>
                        </li>


                    </ul>
                </nav>

                {{-- RIGHT BUTTONS + BURGER --}}
                <div class="flex items-center gap-x-10 justify-self-end">
                    <div class="flex items-center gap-x-3 lg:gap-x-2">
                        <a
                            wire:navigate
                            href="{{ route('contact') }}"
                            class="btn-fancy btn btn-sm lg:btn-md btn-primary"
                        >
                            Kontakt
                        </a>

                        {{-- BURGER BUTTON (MOBILE) --}}
                        <button
                            type="button"
                            aria-label="Open menu"
                            class="lg:hidden"
                            title="Open menu"
                            @click="
                                mobileMenuOpen = !mobileMenuOpen;
                                rotation += 90;
                            "
                        >
                            <x-icon
                                name="fas.bars"
                                class="h-5 w-5 text-[#002a42] opacity-65 transition-transform duration-300"
                                x-bind:style="'transform: rotate(' + rotation + 'deg)'"
                            />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MOBILE MENU --}}
    <nav
        class="lg:hidden"
        x-show="mobileMenuOpen"
        x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="duration-150 ease-in"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
    >
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div
                class="mt-3 bg-white rounded-2xl shadow-[0_2px_10px_0px_rgba(0,0,0,0.15)] py-2.5 px-4"
            >
                <ul class="flex flex-col">
                    <li>
                        <a
                            wire:navigate
                            href="{{ route('home') }}"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'home'; mobileMenuOpen = false"
                            :class="{ 'underline-secondary': '{{ Route::currentRouteName() }}' === 'home' }"
                        >
                            Home
                        </a>
                    </li>
                    <li>
                        <a
                            wire:navigate
                            href="{{ route('projects') }}"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'projects'; mobileMenuOpen = false"
                            wire:current="underline-secondary"
                        >
                            Projekte
                        </a>
                    </li>
                    <li>
                        <a
                            wire:navigate
                            href="{{ route('services') }}"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'services'; mobileMenuOpen = false"
                            wire:current="underline-secondary">
                            Leistungen
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('about') }}"
                            wire:navigate
                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            wire:current="underline-secondary"
                            @click="mobileMenuOpen = false; activeSection = null"
                        >
                            <span>About</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-3 flex flex-col gap-y-2">
                    <a
                        wire:navigate
                        href="{{ route('contact') }}"
                        class="btn-fancy btn btn-primary btn-sm lg:btn-md"
                        @click="activeSection = 'contact'; mobileMenuOpen = false"
                    >
                        Kontaktiere uns
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
