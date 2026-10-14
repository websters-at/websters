<?php

use Livewire\Volt\Component;

new class extends Component {};

?>

<section
    class="relative pt-32 pb-16 lg:pt-40 lg:pb-28 overflow-hidden"
    x-data="{ show: false }"
    x-intersect="show = true"
>

    <!-- Hintergrund: Glow + Grid -->
    <div class="absolute inset-0 -z-20 pointer-events-none">

        <!-- Soft Glow -->
        <div
            class="absolute -top-10 left-1/2 -translate-x-1/2 w-[90%] h-40
                   bg-[#4bc8e7]/20 blur-3xl opacity-30 rounded-full">
        </div>


        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 opacity-[0.2]"
                 style="
                background-image:
                    linear-gradient(#4bc8e7 1px, transparent 1px),
                    linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                background-size: 50px 50px;">
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 md:h-32 bg-gradient-to-t from-white to-transparent -z-10"></div>


    </div>


    <div class="max-w-6xl mx-auto px-4 xl:px-0 flex flex-col items-start lg:items-center">

        <!-- Headline -->
        <h1
            class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold font-poppins text-transparent
                   lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5
                   text-left lg:text-center mx-0 lg:mx-auto fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.2s"
        >
            Buche einen Termin mit unserem Team
        </h1>

        <!-- Subtext -->
        <p
            class="mt-3 text-sm lg:text-base font-poppins text-slate-600
                   text-left lg:text-center max-w-xl fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.3s"
        >
            Wähle einen passenden Zeitpunkt und wir nehmen uns Zeit für dein Projekt,
            deine Fragen oder eine persönliche Beratung.
        </p>

        <!-- Inline Booking Widget (2-Klick-Datenschutz: lädt erst nach Einwilligung) -->
        <div
            class="w-full mt-12 group fade-up min-h-[540px]"
            :class="{ 'show': show }"
            style="transition-delay:.4s"
        >
            <div style="width:100%;height:100%;overflow:hidden" id="my-cal-inline-websters-meeting"></div>
            <div id="cal-consent-box" class="rounded-2xl border border-slate-200 bg-slate-50 p-6 text-center">
                <p class="text-sm font-semibold text-brand-dark">Online-Terminbuchung laden?</p>
                <p class="mt-2 text-sm text-slate-600">Das Buchungs-Widget wird von Cal.com (USA) geladen – dabei werden Daten an Cal.com übertragen. <a class="underline font-semibold" href="https://cal.com/michi4/websters-meeting" target="_blank" rel="noopener noreferrer">Alternativ direkt auf cal.com buchen</a>.</p>
                <button type="button" id="cal-consent-btn" class="btn btn-sm btn-primary mt-4 text-white">Widget laden & einwilligen</button>
            </div>
            <noscript>
                <p class="mt-4 text-center text-sm text-slate-600">
                    Das Buchungs-Widget benötigt JavaScript.
                    <a class="underline font-semibold" href="https://cal.com/michi4/websters-meeting">Termin direkt auf cal.com buchen</a>
                    oder schreib uns an
                    <a class="underline font-semibold" href="mailto:office@websters.at">office@websters.at</a>.
                </p>
            </noscript>
        </div>
    </div>
</section>

<script type="text/javascript">
    (function () {
        var KEY = 'websters-consent-cal';
        var box = document.getElementById('cal-consent-box');
        var btn = document.getElementById('cal-consent-btn');

        function loadCal() {
            if (window.__calLoaded) return;
            window.__calLoaded = true;
            if (box) box.style.display = 'none';
            (function (C, A, L) {
                var p = function (a, ar) { a.q.push(ar); };
                var d = C.document;
                C.Cal = C.Cal || function () {
                    var cal = C.Cal;
                    var ar = arguments;
                    if (!cal.loaded) {
                        cal.ns = {};
                        cal.q = cal.q || [];
                        d.head.appendChild(d.createElement('script')).src = A;
                        cal.loaded = true;
                    }
                    if (ar[0] === L) {
                        var api = function () { p(api, arguments); };
                        var namespace = ar[1];
                        api.q = api.q || [];
                        if (typeof namespace === 'string') {
                            cal.ns[namespace] = cal.ns[namespace] || api;
                            p(cal.ns[namespace], ar);
                            p(cal, ['initNamespace', namespace]);
                        } else p(cal, ar);
                        return;
                    }
                    p(cal, ar);
                };
            })(window, 'https://app.cal.com/embed/embed.js', 'init');

            Cal('init', 'websters-meeting', {origin:'https://app.cal.com'});

            Cal.ns['websters-meeting']('inline', {
                elementOrSelector: '#my-cal-inline-websters-meeting',
                config: {'layout':'month_view'},
                calLink: 'michi4/websters-meeting',
            });

            Cal.ns['websters-meeting']('ui', {'hideEventTypeDetails':false,'layout':'month_view'});

            // Fallback: if the Cal.com embed is blocked (adblock/offline), show a booking link
            // instead of leaving an empty gap.
            setTimeout(function () {
                var host = document.getElementById('my-cal-inline-websters-meeting');
                if (host && !host.querySelector('iframe')) {
                    host.insertAdjacentHTML('afterend',
                        '<p class="mt-4 text-center text-sm text-slate-600">' +
                        'Das Buchungs-Widget konnte nicht geladen werden. ' +
                        '<a class="underline font-semibold" href="https://cal.com/michi4/websters-meeting">Termin direkt auf cal.com buchen</a> ' +
                        'oder ruf uns an: <a class="underline font-semibold" href="tel:+4367763177763">+43 677 63177763</a>.' +
                        '</p>');
                }
            }, 8000);
        }

        try {
            if (window.localStorage && localStorage.getItem(KEY) === '1') loadCal();
            else if (btn) btn.addEventListener('click', function () {
                try { localStorage.setItem(KEY, '1'); } catch (e) {}
                loadCal();
            });
        } catch (e) {
            if (btn) btn.addEventListener('click', loadCal);
        }
    })();
</script>
