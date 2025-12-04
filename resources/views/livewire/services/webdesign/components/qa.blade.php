<?php

use Livewire\Volt\Component;

new class extends Component {};
?>

<section
    class="lg:pt-16 pb-6 lg:pb-16 font-poppins"
    id="faq"
    x-data="{ active: null, show: false }"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <!-- HEADER -->
        <div class="flex flex-col items-start md:px-4 lg:px-8 fade-up"
             :class="{ 'show': show }"
             style="transition-delay:.1s"
        >
            <div class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text
                        text-transparent text-2xl font-semibold sm:w-2/3 md:w-1/2
                        lg:mt-9 lg:text-4xl lg:leading-tight xl:w-2/3">
                Häufig gestellte Fragen zur Website-Entwicklung
            </div>

            <p class="text-sm font-medium text-brand-dark leading-normal lg:text-base mt-4
                      sm:w-2/3 md:w-1/2 xl:w-2/5">
                Alle Antworten zu Preisen, Ablauf, Support und technischen Details.
            </p>
        </div>

        <div class="mt-6 border-b border-b-neutral-100 lg:mt-8"></div>

        <!-- FAQ LIST -->
        <div class="mt-6 space-y-3 md:px-4 lg:mt-9 lg:px-8">

            @php
                $faqs = [
                    [
                        'id' => 'kosten',
                        'q' => 'Was kostet eine Website bei euch wirklich?',
                        'a' => 'Unsere Pakete beginnen bei 990 € für den Website Starter, ab 1990 € für das Komplett-Paket und ab 2990 € für die Premium-Variante. Der genaue Preis hängt von deinen Anforderungen ab – wir erstellen dir ein maßgeschneidertes Angebot ohne versteckte Kosten.'
                    ],
                    [
                        'id' => 'laufende-kosten',
                        'q' => 'Welche laufenden Kosten fallen nach dem Launch an?',
                        'a' => 'Es fallen monatliche Kosten für Hosting, Domain und optional für ein Wartungspaket an. Das Wartungspaket umfasst Updates, Sicherheitschecks, Backups und Support. Alles transparent ohne versteckte Gebühren.'
                    ],
                    [
                        'id' => 'dauer',
                        'q' => 'Wie lange dauert es, bis meine Website online geht?',
                        'a' => 'Ein typisches Projekt dauert 4–6 Wochen. Der Website Starter ist meist in 2–3 Wochen fertig, komplexere Projekte benötigen 6–8 Wochen. Du wirst durchgehend über den Fortschritt informiert.'
                    ],
                    [
                        'id' => 'enthalten',
                        'q' => 'Was ist im Preis alles enthalten?',
                        'a' => 'Alle Websites beinhalten professionelles Design, responsive Umsetzung, SEO-Basics, Kontaktformular und Inhalteinpflege. Höhere Pakete umfassen zusätzlich Copywriting, erweiterte SEO und individuelle Funktionen.'
                    ],
                    [
                        'id' => 'bearbeiten',
                        'q' => 'Kann ich die Website später selbst bearbeiten?',
                        'a' => 'Ja. Du erhältst ein modernes CMS, mit dem du Texte, Bilder und Seiten schnell selbst bearbeiten kannst. Auf Wunsch geben wir eine kurze Einschulung dazu.'
                    ],
                    [
                        'id' => 'support',
                        'q' => 'Welche Unterstützung erhalte ich nach dem Go-Live?',
                        'a' => '30 Tage kostenloser Support sind inkludiert. Zusätzlich kannst du ein Wartungspaket buchen, das Updates, Backups und Sicherheitschecks umfasst.'
                    ],
                    [
                        'id' => 'referenzen',
                        'q' => 'Können wir vor der Beauftragung Referenzen sehen?',
                        'a' => 'Natürlich. Wir zeigen dir passende Beispiele aus deiner Branche. Viele Kunden sind auch bereit, über ihre Erfahrungen mit uns zu berichten.'
                    ],
                ];
            @endphp

            @foreach ($faqs as $index => $faq)
                <div class="group rounded-2xl border border-slate-200 bg-white/70 backdrop-blur
                            hover:border-slate-300 transition-all fade-up"
                     :class="{ 'show': show }"
                     style="transition-delay: {{ 0.15 + ($index * 0.1) }}s">

                    <button
                        @click="active === '{{ $faq['id'] }}' ? active = null : active = '{{ $faq['id'] }}'"
                        :aria-expanded="active === '{{ $faq['id'] }}'"
                        type="button"
                        class="w-full flex items-center justify-between gap-x-4 px-4 py-4
                               rounded-2xl text-left cursor-pointer"
                    >

                        <div class="font-semibold text-brand-dark md:text-lg xl:text-xl">
                            {{ $faq['q'] }}
                        </div>

                        <figure class="flex shrink-0 items-center justify-center rounded-full bg-slate-200 p-1.5
                                       transition-transform"
                                :class="active === '{{ $faq['id'] }}' ? 'rotate-45' : 'rotate-0'">

                            <svg class="h-4 w-4 text-slate-700" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"/>
                            </svg>

                        </figure>

                    </button>

                    <div class="overflow-hidden transition-[max-height] duration-300 ease-out"
                         :class="active === '{{ $faq['id'] }}' ? 'max-h-96' : 'max-h-0'">

                        <div class="px-4 pb-4 pt-0 text-sm md:text-base text-neutral-600 leading-relaxed">
                            {{ $faq['a'] }}
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
