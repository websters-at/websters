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
        <!-- Large floating orbs - Responsive sizes -->
        <ul class="bubbles pointer-events-none absolute inset-0 overflow-hidden">
            <li class="bubble bubble1"></li>
            <li class="bubble bubble2"></li>
            <li class="bubble bubble3"></li>
            <li class="bubble bubble4"></li>
            <li class="bubble bubble5"></li>
            <li class="bubble bubble6"></li>
            <li class="bubble bubble7"></li>
            <li class="bubble bubble8"></li>
            <li class="bubble bubble9"></li>
            <li class="bubble bubble10"></li>
        </ul>

        <!-- Grid pattern overlay with low opacity -->
        <div class="absolute inset-0 opacity-4 sm:opacity-5"
             style="background-image: linear-gradient(#4bc8e7 1px, transparent 1px), linear-gradient(90deg, #4bc8e7 1px, transparent 1px);
                    background-size: 30px 30px;"></div>
    </div>

    <!-- Bottom gradient fade to blend with next section -->
    <div
        class="absolute bottom-0 left-0 right-0 h-20 sm:h-24 md:h-32 bg-gradient-to-t from-white to-transparent -z-10"></div>

    <section class="pt-32 lg:pt-48 md:pt-40" id="home">
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

            <!-- Heading -->
            <div
                class="bg-gradient-to-r from-[#4bc8e7] via-[#ec65ba80] to-[#ec65ba]
                bg-clip-text text-3xl md:text-4xl lg:text-6xl xl:text-7xl font-poppins font-extrabold text-transparent
                mt-4 sm:mt-6 w-full max-w-xl sm:max-w-2xl lg:max-w-4xl
                leading-snug lg:mt-8 lg:leading-tight"
            >
                We Design To Inspire & Elevate Your Brand
            </div>

            <!-- Subcopy -->
            <p
                class="mt-4 sm:mt-6 font-poppins font-medium
                text-sm sm:text-sm md:text-base lg:text-lg text-gray-600
                w-full max-w-xl sm:max-w-2xl lg:max-w-3xl"
            >
                Mit cleanem Design und klaren Software-Lösungen bringen wir dich und deine Marke sichtbar und professionell online voran.
            </p>

        </div>
    </section>
</div>
