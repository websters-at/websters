<?php

use Livewire\Volt\Component;

new class extends Component {

};
?>

<section class="relative pt-32 pb-16 lg:pt-40 lg:pb-28 overflow-hidden">

    <!-- Hintergrund: leichter Glow + Grid -->
    <div class="absolute inset-0 -z-20 pointer-events-none">
        <!-- Soft Glow -->
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-[90%] h-40
                    bg-[#4bc8e7]/20 blur-3xl opacity-30 rounded-full"></div>

        <!-- Grid -->
        <div class="absolute inset-0 opacity-[0.09]"
             style="background-image:
                 linear-gradient(#4bc8e7 1px, transparent 1px),
                 linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                 background-size: 60px 60px;">
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 xl:px-0 flex flex-col items-start lg:items-center">

        <!-- Badge -->
        <div class="inline-flex items-center justify-center rounded-full font-poppins
                    font-medium text-white bg-primary/90 px-3 py-1 text-xs sm:text-sm">
            Termin buchen
        </div>

        <!-- Headline -->
        <h2 class="bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-3xl font-bold font-poppins text-transparent
           lg:text-5xl mt-8 sm:w-2/3 md:w-3/4 lg:mt-9 lg:leading-tight xl:w-3/5
           text-left lg:text-center mx-0 lg:mx-auto">
            Buche einen Termin mit unserem Team
        </h2>

        <!-- Subtext -->
        <p class="mt-3 text-sm lg:text-base font-poppins text-slate-600
                  text-left lg:text-center max-w-xl">
            Wähle einen passenden Zeitpunkt und wir nehmen uns Zeit für dein Projekt,
            deine Fragen oder eine persönliche Beratung.
        </p>

        <!-- Inline Booking Widget Wrapper: jetzt wie Impressum (kein Shadow, Border-Kontrast) -->
        <div class="w-full mt-12 group">
            <div style="width:100%;height:100%;overflow:hidden" id="my-cal-inline-websters-meeting"></div>
        </div>
    </div>
</section>

<script type="text/javascript">
    (function (C, A, L) { let p = function (a, ar) { a.q.push(ar); }; let d = C.document; C.Cal = C.Cal || function () { let cal = C.Cal; let ar = arguments; if (!cal.loaded) { cal.ns = {}; cal.q = cal.q || []; d.head.appendChild(d.createElement("script")).src = A; cal.loaded = true; } if (ar[0] === L) { const api = function () { p(api, arguments); }; const namespace = ar[1]; api.q = api.q || []; if(typeof namespace === "string"){cal.ns[namespace] = cal.ns[namespace] || api;p(cal.ns[namespace], ar);p(cal, ["initNamespace", namespace]);} else p(cal, ar); return;} p(cal, ar); }; })(window, "https://app.cal.com/embed/embed.js", "init");
    Cal("init", "websters-meeting", {origin:"https://app.cal.com"});

    Cal.ns["websters-meeting"]("inline", {
        elementOrSelector:"#my-cal-inline-websters-meeting",
        config: {"layout":"month_view"},
        calLink: "michi4/websters-meeting",
    });

    Cal.ns["websters-meeting"]("ui", {"hideEventTypeDetails":false,"layout":"month_view"});
</script>
