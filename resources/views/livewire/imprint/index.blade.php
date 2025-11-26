<?php

use Livewire\Volt\Component;

new class extends Component {

}; ?>
<section class="mt-32 lg:mt-16 mb-8 lg:mb-4 lg:pt-20 relative" id="impressum">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="flex flex-col gap-y-8 md:px-4 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left">
                <div
                    class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm"
                >
                    Impressum
                </div>

                <div
                    class="mt-6 bg-gradient-to-b from-[#002a42] to-slate-600 bg-clip-text text-2xl font-poppins font-semibold text-transparent lg:text-4xl lg:leading-tight lg:mt-8"
                >
                    Rechtliche Informationen & Offenlegung
                </div>

                <p class="mt-4 text-sm font-poppins text-slate-600 sm:w-4/5 lg:w-3/5">
                    Informationen und Offenlegung gemäß §5 (1) ECG, § 25 MedienG, § 63 GewO und § 14 UGB.
                </p>
            </div>

            <!-- Content -->
            <div class="grid gap-6 lg:grid-cols-2 lg:items-start lg:gap-8">
                <!-- Left column: Betreiber & Kontakt -->
                <div class="space-y-4">
                    <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                        <div class="p-5 sm:p-6">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase mb-3">
                                Webseitenbetreiber
                            </h3>
                            <dl class="text-sm font-poppins text-slate-600 space-y-1.5">
                                <div>
                                    <dt class="font-medium text-slate-700">Webseitenbetreiber:</dt>
                                    <dd>Stevan Vlajic</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">Geschäftsführer:</dt>
                                    <dd>Stevan Vlajic</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">Anschrift:</dt>
                                    <dd>Auwiesenstraße 95, 4030 Linz</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">Gewerbeaufsichtbehörde:</dt>
                                    <dd>Magistrat der Stadt Linz</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                        <div class="p-5 sm:p-6">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase mb-3">
                                Kontaktdaten
                            </h3>
                            <dl class="text-sm font-poppins text-slate-600 space-y-1.5">
                                <div>
                                    <dt class="font-medium text-slate-700">Telefon:</dt>
                                    <dd>+435504669179</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-slate-700">E-Mail:</dt>
                                    <dd>
                                        <a href="mailto:office@websters.at" class="underline underline-offset-2 hover:text-primary transition">
                                            office@websters.at
                                        </a>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                        <div class="p-5 sm:p-6">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase mb-3">
                                Anwendbare Rechtsvorschriften
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Anwendbare Rechtsvorschriften sind unter folgendem Link abrufbar:
                                <a href="https://www.ris.bka.gv.at" target="_blank" rel="noopener noreferrer"
                                   class="underline underline-offset-2 hover:text-primary transition">
                                    www.ris.bka.gv.at
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right column: Rechtliche Hinweise -->
                <div class="space-y-4">
                    <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase">
                                Online-Streitbeilegung
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Verbraucher, welche in Österreich oder in einem sonstigen Vertragsstaat der ODR-VO
                                niedergelassen sind, haben die Möglichkeit, Probleme bezüglich dem entgeltlichen Kauf
                                von Waren oder Dienstleistungen im Rahmen einer Online-Streitbeilegung (nach OS, AStG)
                                zu lösen. Die Europäische Kommission stellt eine Plattform hierfür bereit:
                                <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer"
                                   class="underline underline-offset-2 hover:text-primary transition">
                                    https://ec.europa.eu/consumers/odr
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase">
                                Urheberrecht
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Die Inhalte dieser Webseite unterliegen, soweit dies rechtlich möglich ist, diversen
                                Schutzrechten (z.&nbsp;B. dem Urheberrecht). Jegliche Verwendung oder Verbreitung von
                                bereitgestelltem Material, welche urheberrechtlich untersagt ist, bedarf der
                                schriftlichen Zustimmung des Webseitenbetreibers.
                            </p>
                        </div>
                    </div>

                    <div class="group rounded-2xl border border-slate-200 bg-white/60 hover:border-slate-300 transition-all">
                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="font-poppins font-semibold text-sm text-slate-800 tracking-wide uppercase">
                                Haftungsausschluss
                            </h3>
                            <p class="text-sm font-poppins text-slate-600">
                                Trotz sorgfältiger inhaltlicher Kontrolle übernimmt der Webseitenbetreiber keine Haftung
                                für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich
                                deren Betreiber verantwortlich. Sollten Sie dennoch auf ausgehende Links aufmerksam
                                werden, welche auf eine Webseite mit rechtswidriger Tätigkeit oder Information verweisen,
                                ersuchen wir um einen dementsprechenden Hinweis, um diese nach § 17 Abs. 2 ECG
                                umgehend zu entfernen.
                            </p>
                            <p class="text-sm font-poppins text-slate-600">
                                Die Urheberrechte Dritter werden vom Betreiber dieser Webseite mit größter Sorgfalt
                                beachtet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden,
                                bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden derartiger Rechtsverletzungen
                                werden wir den betroffenen Inhalt umgehend entfernen.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
