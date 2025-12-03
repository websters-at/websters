<?php

use App\Models\Lead;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public string $email = "";

    public function save(): void
    {
        try {
            $validatedData = $this->validate([
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('leads', 'email')
                ]
            ]);

            Lead::create([
                "email" => $this->email
            ]);

            $this->toast(
                type: 'success',
                title: 'Erfolg!',
                description: 'Vielen Dank! Wir werden uns bald bei dir melden!',
                position: 'toast-bottom toast-end',
                icon: 'o-check-circle',
                css: 'alert-success',
                timeout: 3000,
                redirectTo: null
            );

            $this->email = "";

        } catch (ValidationException $e) {
            $this->toast(
                type: 'error',
                title: 'Bereits registriert / Ungültig',
                description: 'Diese E-Mail-Adresse ist bereits in unserer Liste / ungültig!',
                position: 'toast-bottom toast-end',
                icon: 'o-x-circle',
                css: 'alert-error',
                timeout: 3000,
                redirectTo: null
            );

        } catch (Exception $e) {
            $this->toast(
                type: 'error',
                title: 'Fehler',
                description: 'Ein unerwarteter Fehler ist aufgetreten: ' . $e->getMessage(),
                position: 'toast-bottom toast-end',
                icon: 'o-x-circle',
                css: 'alert-error',
                timeout: 3000,
                redirectTo: null
            );
        }
    }
}; ?>


<div class="relative overflow-hidden opacity-100">

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div
            class="absolute inset-0 z-0"
            style="
            background-image:
                radial-gradient(125% 125% at 40% 70%, #ffffff 40%, rgb(255, 122, 195) 100%);
            background-size: 100% 100%;
        "
        ></div>
        <div class="absolute inset-0 opacity-[0.1]"
             style="
                background-image:
                    linear-gradient(#4bc8e7 1px, transparent 1px),
                    linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                background-size: 50px 50px;">
        </div>
    </div>

    <div
        class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 md:h-32 bg-gradient-to-t from-white to-transparent -z-10"></div>

    <section class="pt-32 lg:pt-52 lg:pb-12 md:pt-40 pop-in" id="home">
        <div
            class="max-w-6xl mx-auto px-4 xl:px-0
            flex flex-col
            items-start text-left
            md:items-center md:text-center"
        >
            <!-- Pill -->
            <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs
                sm:px-3 sm:py-1.5 sm:text-sm">Webagentur Websters
            </div>

            <div
                x-data="typeWriter({
        words: ['Webentwicklung', 'Webdesign', 'Custom Software', 'IT-Beratung'],
        typeSpeed: 100,
        deleteSpeed: 100,
        holdTime: 1500
    })"
                x-init="start()"
                class="text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl
           font-poppins font-black text-neutral
           mt-4 sm:mt-6 leading-snug lg:leading-tight break-words"
            >

                <span class="block sm:inline bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text text-transparent">Dein pinker</span>
                <span class="block sm:inline bg-gradient-to-b from-[#002a42] to-slate-500 bg-clip-text text-transparent">Partner für</span>

                <br class="hidden sm:block">

                <!-- TYPEWRITER -->
                <span
                    class="typewriter-wrapper block sm:inline align-top whitespace-nowrap
                        bg-gradient-to-b from-primary to-[#FF7AC3A5] bg-clip-text text-transparent"

                >
        <span x-text="currentText"></span>
        <span class="cursor inline-block w-[0.6ch] font-black opacity-0 leading-none">|</span>
    </span>
            </div>




            <!-- Subcopy -->
            <p
                class="mt-4 sm:mt-6 font-poppins font-medium
                text-sm sm:text-sm md:text-base lg:text-md text-gray-600
                w-full max-w-xl sm:max-w-2xl lg:max-w-3xl"
            >
                Egal ob du eine neue Website, eine individuelle Software oder einfach IT-Beratung brauchst - Das Team von Websters steht dir immer gerne zur Seite.
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
