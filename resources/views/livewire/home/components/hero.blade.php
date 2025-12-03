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


<div class="relative overflow-hidden opacity-0 pop-in">

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 -z-10 overflow-hidden">

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

    <section class="pt-32 lg:pt-52 lg:pb-12 md:pt-40" id="home">
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
                class="bg-gradient-to-r from-[#4bc8e7] via-[#ec65ba80] to-[#ec65ba]
        bg-clip-text text-transparent
        text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl
        font-poppins font-black
        mt-4 sm:mt-6 w-full
        leading-snug lg:leading-tight break-words"
            >

                <span class="invisible absolute font-black pointer-events-none select-none">
                    Webentwicklung Webdesign Softwareentwicklung IT-Beratung
                </span>

                <span class="block sm:inline">Dein pinker</span>
                <span class="block sm:inline">Partner für</span>


                <br class="hidden sm:block">

                <!-- TYPEWRITER -->
                <span class="typewriter-wrapper block sm:block align-top whitespace-nowrap">
                <span x-text="currentText"></span>
                <span class="cursor inline-block w-[0.6ch] font-black text-neutral opacity-0 leading-none">|</span>
            </span>

            </div>


            <!-- Subcopy -->
            <p
                class="mt-4 sm:mt-6 font-poppins font-medium
                text-sm sm:text-sm md:text-base lg:text-lg text-gray-600
                w-full max-w-xl sm:max-w-2xl lg:max-w-3xl"
            >
                Mit cleanem Design und klaren Software-Lösungen bringen wir dich und deine Marke sichtbar und
                professionell online voran.
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
