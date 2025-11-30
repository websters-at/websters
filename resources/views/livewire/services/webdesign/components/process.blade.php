<section class="relative mt-12 lg:mt-16 overflow-hidden bg-slate-50 py-8" id="process">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <!-- INTRO -->
        <div class="flex flex-col items-start lg:items-center text-left lg:text-center md:px-4 lg:px-8">
            <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-3 py-1 text-xs sm:text-sm">
                Unser Ablauf
            </div>

            <h2 class="mt-6 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-transparent text-2xl md:text-3xl lg:text-4xl font-poppins font-semibold leading-snug lg:leading-tight sm:w-4/5 md:w-3/5 lg:w-3/5">
                Das ist unsere Vorgehensweise – strukturiert & transparent
            </h2>

            <p class="mt-3 text-sm font-poppins text-slate-600 sm:w-3/4 md:w-2/3 lg:w-2/5">
                Jeder Schritt ist klar definiert, damit du jederzeit genau weißt, wo wir stehen.
            </p>
        </div>

        <!-- TIMELINE -->
        <div class="mt-12 md:mt-14 lg:mt-16 md:px-4 lg:px-8">

            <!-- line on desktop -->
            <div class="hidden lg:block relative mb-10">
                <div class="absolute left-0 right-0 top-1/2 h-[2px]
             bg-gradient-to-r from-[#4bc8e7] via-[#ec65ba50] to-[#ec65ba] opacity-30"></div>
            </div>

            @php
                $steps = [
                  ['title' => 'Projektstart', 'text' => 'Wir klären Ziele, Inhalte und den passenden Stil für deine Website.'],
                  ['title' => 'Designentwürfe', 'text' => 'Du erhältst erste Layouts und visuelle Richtungen für dein Branding.', 'pdf' => asset('assets/example/example-design.pdf')],
                  ['title' => 'Umsetzung', 'text' => 'Wir entwickeln deine Website technisch sauber und mobil optimiert.'],
                  ['title' => 'Präsentation', 'text' => 'Gemeinsames Durchgehen, Feedback sammeln und Feinschliffe setzen.'],
                  ['title' => 'Go-Live', 'text' => 'Nach finaler Prüfung geht deine neue Website offiziell online.'],
                ];
            @endphp

            <div class="grid gap-6 md:gap-10 md:grid-cols-2 lg:grid-cols-5 justify-items-center">

                @foreach($steps as $step)
                    <div class="relative flex flex-col items-center w-full max-w-[280px] sm:max-w-xs md:max-w-full">

                        {{-- mobile vertical connector --}}
                        @if (! $loop->last)
                            <div class="absolute left-1/2 -translate-x-1/2 top-12 bottom-0 border-l border-primary/10 md:hidden"></div>
                        @endif

                        <!-- Step number -->
                        <div class="flex justify-center mb-4 lg:mb-2 w-full">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white border border-primary/30 shadow-[0_4px_12px_rgba(0,0,0,0.05)] text-xs font-poppins font-semibold text-primary">
                                {{ $loop->iteration }}
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="rounded-2xl border border-neutral-200 bg-white/80 backdrop-blur-xl p-5 shadow-[0_4px_12px_rgba(0,0,0,0.05)] w-full flex flex-col text-center md:text-left">
                            <h3 class="text-sm font-poppins font-semibold text-neutral-800">
                                {{ $step['title'] }}
                            </h3>
                            <p class="mt-2 text-xs md:text-sm font-poppins text-neutral-600 leading-relaxed">
                                {{ $step['text'] }}
                            </p>
                        </div>

                        @isset($step['pdf'])
                            <div class="flex justify-center md:justify-end lg:justify-center mt-3 w-full">
                                <x-button
                                    link="{{ $step['pdf'] }}"
                                    class="btn btn-xs btn-primary text-white"
                                    icon="o-document-arrow-down"
                                    label="Beispiel ansehen"
                                />
                            </div>
                        @endisset

                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
