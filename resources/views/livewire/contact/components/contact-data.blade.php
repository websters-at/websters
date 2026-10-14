<?php

use Livewire\Volt\Component;

new class extends Component {};
?>

<section
    class="mt-12 bg-slate-50 py-8 md:py-12 lg:py-16"
    x-data="{ show: false }"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <div class="grid gap-y-8 md:px-4 lg:grid-cols-2 lg:items-center lg:gap-x-12 lg:gap-y-0 lg:px-8">

            <!-- LEFT COLUMN -->
            <div
                class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.1s"
            >
                <div
                    class="mt-8 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text
                    text-2xl font-poppins font-bold text-transparent
                    sm:w-4/5 md:w-3/5 lg:mt-9 lg:w-11/12 lg:text-4xl lg:leading-tight xl:w-3/4 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.15s"
                >
                    Kontaktiere unser Team
                </div>

                <p
                    class="mt-4 text-sm font-poppins font-medium text-slate-600
                    sm:w-1/2 lg:w-11/12 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.25s"
                >
                    Wir freuen uns darauf, von dir zu hören. Egal ob Anfrage, Projektidee
                    oder Kooperation. Wir stehen dir gerne zur Verfügung.
                </p>

                <!-- CONTACT INFO -->
                <div
                    class="mt-8 flex flex-col flex-wrap gap-2 text-sm font-medium text-neutral-500 lg:mt-9 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.35s"
                >
                    <a href="tel:+4367763177763">+43 677 63177763</a>
                    <a href="mailto:office@websters.at">office@websters.at</a>
                    Libellenweg 13, 4209 Engerwitzdorf
                </div>

                <!-- SOCIAL ICONS -->
                <div
                    class="mt-8 flex flex-wrap items-center gap-4 lg:mt-9 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.45s"
                >
                    <a href="https://github.com/websters-at" target="_blank" rel="noopener noreferrer" aria-label="Websters auf GitHub" title="GitHub" class="group">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition-all group-hover:border-[#4bc8e7] group-hover:shadow-md">
                            <x-icon name="fab.github" class="h-5 w-5 text-slate-600 opacity-70 transition-all group-hover:opacity-100 group-hover:text-[#002a42]" />
                        </div>
                    </a>

                    <a href="https://www.instagram.com/websters.at/" target="_blank" rel="noopener noreferrer" aria-label="Websters auf Instagram" title="Instagram" class="group">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition-all group-hover:border-[#4bc8e7] group-hover:shadow-md">
                            <x-icon name="fab.instagram" class="h-5 w-5 text-slate-600 opacity-70 transition-all group-hover:opacity-100 group-hover:text-[#002a42]" />
                        </div>
                    </a>

                    <a href="https://www.facebook.com/profile.php?id=61569509807621" target="_blank" rel="noopener noreferrer" aria-label="Websters auf Facebook" title="Facebook" class="group">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition-all group-hover:border-[#4bc8e7] group-hover:shadow-md">
                            <x-icon name="fab.facebook" class="h-5 w-5 text-slate-600 opacity-70 transition-all group-hover:opacity-100 group-hover:text-[#002a42]" />
                        </div>
                    </a>

                    <a href="tel:+4367763177763" aria-label="Telefon: +43 677 63177763" title="+43 677 63177763" class="group">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition-all group-hover:border-[#4bc8e7] group-hover:shadow-md">
                            <x-icon name="fas.mobile" class="h-5 w-5 text-slate-600 opacity-70 transition-all group-hover:opacity-100 group-hover:text-[#002a42]" />
                        </div>
                    </a>
                </div>
            </div>

            <!-- MAP (2-Klick-Datenschutz: lädt erst nach Einwilligung) -->
            <div class="w-full fade-up" :class="{ 'show': show }" style="transition-delay:.6s">
                <div id="maps-consent-box" class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center h-52 lg:h-full min-h-[13rem] flex flex-col items-center justify-center">
                    <p class="text-sm font-semibold text-brand-dark">Karte laden?</p>
                    <p class="mt-2 text-sm text-slate-600 max-w-md">Die Karte wird von Google Maps (USA) geladen – dabei werden Daten an Google übertragen.</p>
                    <button type="button" id="maps-consent-btn" class="btn btn-sm btn-primary mt-4 text-white">Karte laden & einwilligen</button>
                </div>
                <iframe
                    id="maps-iframe"
                    class="hidden h-52 w-full rounded-3xl lg:h-full"
                    title="Karte: Websters Standort, Libellenweg 13, 4209 Engerwitzdorf"
                    data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2652.1333489629924!2d14.343424971406712!3d48.338742140853945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4773987b8b44c3f1%3A0x6f3f5a985f346e86!2sLibellenweg%2013%2C%204209%20Au%C3%9Fertreffling!5e0!3m2!1sde!2sat!4v1764518723414!5m2!1sde!2sat"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
                <script>
                    (function () {
                        var KEY = 'websters-consent-maps';
                        function loadMaps() {
                            var f = document.getElementById('maps-iframe');
                            var box = document.getElementById('maps-consent-box');
                            if (!f || f.src) return;
                            f.src = f.getAttribute('data-src');
                            f.classList.remove('hidden');
                            if (box) box.style.display = 'none';
                        }
                        try {
                            if (window.localStorage && localStorage.getItem(KEY) === '1') loadMaps();
                            else {
                                var b = document.getElementById('maps-consent-btn');
                                if (b) b.addEventListener('click', function () {
                                    try { localStorage.setItem(KEY, '1'); } catch (e) {}
                                    loadMaps();
                                });
                            }
                        } catch (e) {
                            var b2 = document.getElementById('maps-consent-btn');
                            if (b2) b2.addEventListener('click', loadMaps);
                        }
                    })();
                </script>
                {{-- Fallback for strict corporate networks that block Google Maps:
                     the address stays reachable instead of an empty box. --}}
                <p class="mt-3 text-sm text-slate-500">
                    Karte lädt nicht?
                    <a class="underline font-semibold" href="https://www.google.com/maps/search/?api=1&query=Libellenweg+13+4209+Engerwitzdorf" target="_blank" rel="noopener noreferrer">Auf Google Maps öffnen</a>
                </p>
            </div>

        </div>
    </div>
</section>
