<?php

use Livewire\Volt\Component;

new class extends Component {
    public bool $mobileMenuOpen = false;
}; ?>

<div
    x-data="{ mobileMenuOpen: @entangle('mobileMenuOpen') }"
    class="fixed top-0 inset-x-0 z-50 bg-none "
>
    <livewire:components.upper-nav/>
    <header class="py-4">
        <div class="max-w-7xl mx-auto px-4 xl:px-0">
            <div class="bg-white flex items-center justify-between gap-x-4
            rounded-2xl py-2.5 pl-5 pr-2.5

            shadow-[0_2px_10px_0px_rgba(0,0,0,0.15)]
            border-[1px] border-[#002a421a] lg:grid lg:grid-cols-[1fr_auto_1fr] lg:gap-x-12 lg:rounded-[1.375rem]">
                {{-- LEFT LOGO --}}
                <div class="flex items-center gap-x-10">
                    <a href="#home" title="Home" class="flex items-center">
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
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                href="#about"
                            >
                                About
                            </a>
                        </li>
                        <li>
                            <a
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                href="#services"
                            >
                                Services
                            </a>
                        </li>
                        <li>
                            <a
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                href="#"
                            >
                                Projekte
                            </a>
                        </li>

                        <li>
                            <a
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                href="#"
                            >
                                Team
                            </a>
                        </li>

                        <li>
                            <a
                                class="px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                                href="#"
                            >
                                FAQ
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- RIGHT BUTTONS + BURGER --}}
                <div class="flex items-center gap-x-10 justify-self-end">
                    <div class="flex items-center gap-x-3 lg:gap-x-2">
                        <button class="btn btn-sm lg:btn-md btn-primary">Kontakt</button>

                        {{-- BURGER BUTTON (MOBILE) --}}
                        <button
                            type="button"
                            aria-label="Open menu"
                            class="lg:hidden"
                            title="Open menu"
                            @click="mobileMenuOpen = !mobileMenuOpen"
                        >
                            <svg
                                class="h-6 text-[#002a42]"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                                data-slot="icon"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M3 9a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 9Zm0 6.75a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MOBILE MENU (DROPDOWN) --}}
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
            <div class="mt-3 bg-white rounded-2xl shadow-[0_2px_10px_0px_rgba(0,0,0,0.15)] py-2.5 px-4">
                <ul class="flex flex-col">
                    <li>
                        <a
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            href="#services"
                        >
                            Services
                        </a>
                    </li>
                    <li>
                        <a
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            href="#"
                        >
                            Projekte
                        </a>
                    </li>
                    <li>
                        <a
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            href="#"
                        >
                            Team
                        </a>
                    </li>
                    <li>
                        <a
                            class="block px-3 py-2 text-sm font-medium text-[#002a42] transition hover:text-[#ec65ba]"
                            href="#"
                        >
                            FAQ
                        </a>
                    </li>
                </ul>

                <div class="mt-3 flex flex-col gap-y-2">
                    <button class="btn btn-primary btn-sm lg:btn-md">
                        Kontaktiere uns
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
