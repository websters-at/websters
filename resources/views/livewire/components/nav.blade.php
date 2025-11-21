<?php

use Livewire\Volt\Component;

new class extends Component {
    public bool $mobileMenuOpen = false;
};

?>

<div
    x-data="{
        mobileMenuOpen: @entangle('mobileMenuOpen'),
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
                        href="{{ route('home') }}#home"
                        @click="activeSection = 'home'"
                        class="flex items-center"
                        @click="activeSection = 'home'" {{-- reset when going to plain / --}}
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
                                href="{{ route('home') }}#about"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                @click="activeSection = 'about'"
                                :class="{ 'underline-secondary': activeSection === 'about' }"
                            >
                                About
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('home') }}#team"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                @click="activeSection = 'team'"
                                :class="{ 'underline-secondary': activeSection === 'team' }"
                            >
                                Team
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('home') }}#services"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                @click="activeSection = 'services'"
                                :class="{ 'underline-secondary': activeSection === 'services' }"
                            >
                                Services
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('projects') }}"
                                wire:navigate
                                class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                wire:current="underline-secondary"
                            >
                                <span>Projekte</span>
                                <span class="h-1.5 w-1.5 rounded-full bg-[#ec65ba]"></span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('home') }}#faq"
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                @click="activeSection = 'faq'"
                                :class="{ 'underline-secondary': activeSection === 'faq' }"
                            >
                                FAQ
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- RIGHT BUTTONS + BURGER --}}
                <div class="flex items-center gap-x-10 justify-self-end">
                    <div class="flex items-center gap-x-3 lg:gap-x-2">
                        <a
                            href="{{ route('home') }}#contact"
                            class="btn btn-sm lg:btn-md btn-primary"
                            @click="activeSection = 'contact'"
                        >
                            Kontakt
                        </a>

                        {{-- BURGER BUTTON (MOBILE) --}}
                        <button
                            type="button"
                            aria-label="Open menu"
                            class="lg:hidden"
                            title="Open menu"
                            @click="mobileMenuOpen = !mobileMenuOpen"
                        >
                            <x-icon name="fas.bars" class="h-5 w-5 text-[#002a42] opacity-65" />

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
                            href="{{ route('home') }}#about"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'about'; mobileMenuOpen = false"
                            :class="{ 'underline-secondary': activeSection === 'about' }"
                        >
                            About
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('home') }}#team"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'team'; mobileMenuOpen = false"
                            :class="{ 'underline-secondary': activeSection === 'team' }"
                        >
                            Team
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('home') }}#services"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'services'; mobileMenuOpen = false"
                            :class="{ 'underline-secondary': activeSection === 'services' }"
                        >
                            Services
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('projects') }}"
                            wire:navigate
                            class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            wire:current="underline-secondary"
                            @click="mobileMenuOpen = false; activeSection = null"
                        >
                            <span>Projekte</span>
                            <span class="h-1.5 w-1.5 rounded-full bg-[#ec65ba]"></span>
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('home') }}#faq"
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            @click="activeSection = 'faq'; mobileMenuOpen = false"
                            :class="{ 'underline-secondary': activeSection === 'faq' }"
                        >
                            FAQ
                        </a>
                    </li>
                </ul>

                <div class="mt-3 flex flex-col gap-y-2">
                    <a
                        href="{{ route('home') }}#contact"
                        class="btn btn-primary btn-sm lg:btn-md"
                        @click="activeSection = 'contact'; mobileMenuOpen = false"
                    >
                        Kontaktiere uns
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
