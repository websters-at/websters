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

<footer class="bg-slate-100 pt-10 pb-6 lg:pt-14">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-5">
            <div>
                <div class="text-sm font-poppins font-medium text-neutral-700">
                    <time>{{$currentYear}}</time> - <strong>Websters</strong> · Alle Rechte vorbehalten.
                </div>
                <p class="mt-2 text-sm text-slate-500">Webdesign, Software & IT-Consulting aus Engerwitzdorf, Oberösterreich.</p>
                <div class="mt-4 flex items-center gap-2">
                    <a
                        href="https://www.instagram.com/websters.at/"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="Instagram"
                        aria-label="Websters auf Instagram"
                        class="flex h-10 w-10 items-center justify-center rounded-full transition hover:opacity-80"
                    >
                        <x-icon name="fab.instagram" class="text-slate-600 w-5"/>
                    </a>
                    <a
                        href="https://github.com/websters-at"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="GitHub"
                        aria-label="Websters auf GitHub"
                        class="flex h-10 w-10 items-center justify-center rounded-full transition hover:opacity-80"
                    >
                        <x-icon name="fab.github" class="text-slate-600 w-5"/>
                    </a>
                </div>
            </div>
            <nav aria-label="Leistungen">
                <div class="text-sm font-bold text-brand-dark">Leistungen</div>
                <ul class="mt-3 space-y-2 text-sm font-poppins font-medium text-slate-600">
                    <li><a href="{{ route('webdesign') }}" wire:navigate title="Webdesign">Webdesign</a></li>
                    <li><a href="{{ route('software') }}" wire:navigate title="Individualsoftware">Software</a></li>
                    <li><a href="{{ route('consulting') }}" wire:navigate title="IT-Consulting">Consulting</a></li>
                    <li><a href="{{ route('branchen.index') }}" wire:navigate title="Branchenlösungen">Branchen</a></li>
                    <li><a href="{{ route('home') }}#contact" title="Kontakt">Kontakt</a></li>
                </ul>
            </nav>
            <nav aria-label="Regionen">
                <div class="text-sm font-bold text-brand-dark">Regionen</div>
                <ul class="mt-3 grid grid-cols-2 gap-x-4 gap-y-2 text-sm font-poppins font-medium text-slate-600">
                    <li><a href="{{ route('webdesign.linz') }}" wire:navigate title="Webdesign Linz">Linz</a></li>
                    <li><a href="{{ route('webdesign.wels') }}" wire:navigate title="Webdesign Wels">Wels</a></li>
                    <li><a href="{{ route('webdesign.steyr') }}" wire:navigate title="Webdesign Steyr">Steyr</a></li>
                    <li><a href="{{ route('webdesign.wien') }}" wire:navigate title="Webdesign Wien">Wien</a></li>
                    <li><a href="{{ route('webdesign.graz') }}" wire:navigate title="Webdesign Graz">Graz</a></li>
                    <li><a href="{{ route('webdesign.salzburg') }}" wire:navigate title="Webdesign Salzburg">Salzburg</a></li>
                    <li><a href="{{ route('webdesign.innsbruck') }}" wire:navigate title="Webdesign Innsbruck">Innsbruck</a></li>
                    <li><a href="{{ route('webdesign.klagenfurt') }}" wire:navigate title="Webdesign Klagenfurt">Klagenfurt</a></li>
                    <li><a href="{{ route('webdesign.stpoelten') }}" wire:navigate title="Webdesign St. Pölten">St. Pölten</a></li>
                    <li><a href="{{ route('webdesign.eisenstadt') }}" wire:navigate title="Webdesign Eisenstadt">Eisenstadt</a></li>
                    <li><a href="{{ route('webdesign.bregenz') }}" wire:navigate title="Webdesign Bregenz">Bregenz</a></li>
                </ul>
            </nav>
            <nav aria-label="Tools">
                <div class="text-sm font-bold text-brand-dark">Gratis Tools</div>
                <ul class="mt-3 space-y-2 text-sm font-poppins font-medium text-slate-600">
                    <li><a href="{{ route('tools.domain') }}" wire:navigate title="Domain prüfen – gratis Domain-Check">Domain-Check</a></li>
                    <li><a href="{{ route('tools.seo') }}" wire:navigate title="SEO Check">SEO Check</a></li>
                    <li><a href="{{ route('tools.cookies') }}" wire:navigate title="Cookie Check">Cookie Check</a></li>
                    <li><a href="{{ route('tools.password') }}" wire:navigate title="Passwort Generator">Passwort Generator</a></li>
                    <li><a href="{{ route('tools.index') }}" wire:navigate title="Alle Tools">Alle Tools</a></li>
                </ul>
            </nav>
            <nav aria-label="Rechtliches">
                <div class="text-sm font-bold text-brand-dark">Rechtliches</div>
                <ul class="mt-3 space-y-2 text-sm font-poppins font-medium text-slate-600">
                    <li><a href="{{ route('imprint') }}" wire:navigate title="Impressum">Impressum</a></li>
                    <li><a href="{{ route('data-privacy') }}" wire:navigate title="Datenschutz">Datenschutz</a></li>
                    <li><a href="{{ route('terms') }}" wire:navigate title="Terms & Conditions">AGBs</a></li>
                </ul>
            </nav>
        </div>
        <div class="mt-8 border-t border-neutral-200 pt-4 text-center text-xs text-slate-400">
            Mit ♥ in Oberösterreich gebaut – Webdesign, Software & Consulting.
        </div>
    </div>
</footer>

