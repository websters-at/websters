<?php

use App\Models\Lead;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {}?>


<div class="relative overflow-hidden"
     x-data="{ show: false }"
     x-intersect="show = true"
>

    <!-- BG GRID -->
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

    <section class="pt-32 lg:pt-52 lg:pb-12 md:pt-40" id="home">

        <div class="max-w-6xl mx-auto px-4 xl:px-0 flex flex-col items-center text-center md:items-center md:text-center">

            <!-- BADGE -->
            <div
                class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-3 py-1 text-xs sm:text-sm fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.1s"
            >
                Webagentur Websters
            </div>

            <!-- HEADLINE -->
            <div
                x-data="typeWriter({
                    words: ['Webentwicklung', 'Webdesign', 'Custom Software', 'IT-Beratung'],
                    typeSpeed: 100,
                    deleteSpeed: 100,
                    holdTime: 1500
                })"
                x-init="start()"
                class="text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl
                       font-poppins font-black text-neutral mt-4 sm:mt-6 leading-snug lg:leading-tight break-words fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.2s"
            >
                <span class="block sm:inline bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text text-transparent">
                    Dein pinker
                </span>
                <span class="block sm:inline bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text text-transparent">
                    Partner für
                </span>
                <br class="hidden sm:block">

                <span class="typewriter-wrapper block sm:inline align-top whitespace-nowrap
                             bg-gradient-to-b from-primary to-[#FF7AC3A5] bg-clip-text text-transparent">
                    <span x-text="currentText"></span>
                    <span class="cursor inline-block w-[0.6ch] font-black opacity-0">|</span>
                </span>
            </div>

            <!-- SUBTEXT -->
            <p
                class="mt-4 sm:mt-6 font-poppins font-medium
                       text-sm sm:text-sm md:text-base lg:text-md text-gray-600
                       w-full max-w-xl sm:max-w-2xl lg:max-w-3xl fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.3s"
            >
                Egal ob du eine neue Website, eine individuelle Software oder einfach IT-Beratung brauchst –
                das Team von Websters steht dir immer gerne zur Seite.
            </p>
        </div>

    </section>
</div>


<script>
    function typeWriter({words, typeSpeed, deleteSpeed, holdTime}) {
        return {
            words,
            currentText: '',
            currentWordIndex: 0,
            isDeleting: false,

            async start() {
                while (true) {
                    let word = this.words[this.currentWordIndex];

                    // Typing
                    for (let i = 1; i <= word.length; i++) {
                        this.currentText = word.slice(0, i);
                        await this.sleep(typeSpeed);
                    }


                    await this.sleep(holdTime);

                    // Deleting
                    for (let i = word.length; i >= 0; i--) {
                        this.currentText = word.slice(0, i);
                        await this.sleep(deleteSpeed);
                    }

                    // Next word
                    this.currentWordIndex = (this.currentWordIndex + 1) % this.words.length;
                }
            },

            sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
        }
    }
</script>
