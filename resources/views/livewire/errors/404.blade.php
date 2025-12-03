<?php
use Livewire\Volt\Component;

new class extends Component {
};
?>

<section class="relative min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 overflow-hidden">

    {{-- Aurora Dream Vivid Bloom Background --}}
    <div
        class="absolute inset-0 -z-10 pointer-events-none"
        style="
            background:
                radial-gradient(ellipse 80% 60% at 70% 20%, rgba(77, 200, 232, 0.85), transparent 68%),
                radial-gradient(ellipse 70% 60% at 20% 80%, rgba(255, 122, 192, 0.75), transparent 68%),
                radial-gradient(ellipse 60% 50% at 60% 65%, rgba(255, 235, 170, 0.98), transparent 68%),
                radial-gradient(ellipse 65% 40% at 50% 60%, rgba(120, 190, 255, 0.3), transparent 68%),
                linear-gradient(180deg, #f7eaff 0%, #fde2ea 100%);
        "
    ></div>

    {{-- OPTIONAL: Keep your soft blobs (works beautifully on top of the Aurora background) --}}
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[22rem] h-[22rem] bg-[#4bc8e720] blur-[110px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-[#ec65ba20] blur-[140px] rounded-full"></div>

        <div class="absolute inset-0 opacity-[0.06] mix-blend-soft-light pointer-events-none"
             style="background-image:url('https://grainy-gradients.vercel.app/noise.svg')">
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="w-full max-w-md text-center space-y-6 relative z-10">
        <div class="text-[6rem] sm:text-[8rem] leading-none font-extrabold text-slate-800">404</div>

        <h1 class="text-xl sm:text-2xl md:text-3xl font-semibold bg-clip-text text-transparent
               bg-gradient-to-b from-[#002a42] to-slate-600">
            Seite nicht gefunden
        </h1>
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
