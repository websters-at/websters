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


<div class="relative overflow-hidden">

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <!-- Large floating orbs - Responsive sizes -->
        <div
            class="absolute -top-10 -left-10 w-40 h-40 sm:w-60 sm:h-60 md:w-80 md:h-80 rounded-full bg-[#4bc8e7] opacity-20 animate-float-slow"></div>
        <div
            class="absolute top-1/4 right-1/4 w-32 h-32 sm:w-48 sm:h-48 md:w-64 md:h-64 rounded-full bg-[#4bc8e7] opacity-10 animate-float-slow"></div>
        <div
            class="absolute top-10 -right-20 w-24 h-24 sm:w-36 sm:h-36 md:w-60 md:h-48 rounded-full bg-primary opacity-30 animate-float-slow"></div>
        <!-- Moving gradient waves - Adjusted for mobile -->
        <div
            class="absolute -bottom-20 -left-10 w-full h-32 sm:h-48 md:h-56 bg-gradient-to-r from-[#4bc8e7] to-[#ec65ba] opacity-10 rounded-full blur-lg sm:blur-xl animate-wave"></div>
        <div
            class="absolute -bottom-40 left-1/4 w-3/4 h-28 sm:h-40 md:h-48 bg-gradient-to-l from-[#ec65ba] to-[#4bc8e7] opacity-10 rounded-full blur-lg sm:blur-xl animate-wave-reverse"></div>

        <!-- Grid pattern overlay with low opacity -->
        <div class="absolute inset-0 opacity-3 sm:opacity-5"
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
                sm:px-3 sm:py-1.5 sm:text-sm">Introducing Websters
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
                Gemeinsam bringen wir deine Marke voran – durch liebevolles Design und klare Softwarelösungen, damit du
                online sichtbar und erfolgreich bist.
            </p>

        </div>
    </section>
</div>
