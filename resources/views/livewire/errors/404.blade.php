<?php
use Livewire\Volt\Component;

new class extends Component {
};

?>

<section class="relative min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 overflow-hidden
                bg-gradient-to-br from-primary/40 via-[#eef6fc] to-secondary/40">
    <!-- Background Decoration + Blobs -->
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <!-- soft radial blobs -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[22rem] h-[22rem] bg-[#4bc8e720] blur-[110px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-[#ec65ba20] blur-[140px] rounded-full"></div>
        <!-- optional noise / texture overlay -->
        <div class="absolute inset-0 opacity-[0.06] mix-blend-soft-light pointer-events-none"
             style="background-image:url('https://grainy-gradients.vercel.app/noise.svg')">
        </div>
    </div>

    <div class="w-full max-w-md text-center space-y-6">
        <div class="text-[6rem] sm:text-[8rem] leading-none font-extrabold text-slate-800">404</div>

        <h1 class="text-xl sm:text-2xl md:text-3xl font-semibold bg-clip-text text-transparent
               bg-gradient-to-b from-[#002a42] to-slate-600">
            Seite nicht gefunden
        </h1>

        <p class="text-sm sm:text-base text-slate-600 leading-relaxed px-2">
            Die Seite, die du suchst, existiert leider nicht oder wurde verschoben. <br class="sm:hidden">
            Schau dich gern auf der Startseite um oder kontaktiere uns, wenn du Fragen hast.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-4">
            <a href="{{ route('home') }}" wire:navigate
               class="px-6 py-3 bg-primary text-white btn-fancy rounded-xl font-medium shadow-md hover:bg-primary/90 transition">
                Zur Startseite
            </a>
            <a href="{{ route('contact') }}" wire:navigate
               class="px-6 py-3 border border-primary btn-fancy text-primary rounded-xl font-medium hover:bg-primary/10 transition">
                Kontakt
            </a>
        </div>
    </div>
</section>
