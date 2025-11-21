<?php

use Livewire\Volt\Component;
use App\Models\Lead;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public string $name = "";
    public string $email = "";
    public string $company = "";
    public string $message = "";

    public function save(): void
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
        ]);

        try {
            Lead::create([
                "name" => $this->name,
                "email" => $this->email,
                "company" => $this->company,
                "message" => $this->message,
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
            $this->reset(['name', 'company', 'email', 'message']);
        } catch (Exception $err) {
            $this->reset(['name', 'company', 'email', 'message']);
            $this->toast(
                type: 'error',
                title: 'Fehler',
                description: 'Ein unerwarteter Fehler ist aufgetrete :(',
                position: 'toast-bottom toast-end',
                icon: 'o-x-circle',
                css: 'alert-error',
                timeout: 3000,
                redirectTo: null
            );
        }

    }


}; ?>
<section class="pt-12 mt-10 lg:mt-16 lg:pt-16 relative pb-6 lg:pb-16">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div
            id="contact"
            class="grid gap-y-6 md:px-4 lg:grid-cols-2 lg:items-center lg:gap-x-12 lg:gap-y-0 lg:px-8 xl:gap-x-16"
        >
            <div
                class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left"
            >
                <div class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs
                sm:px-3 sm:py-1.5 sm:text-sm">Services
                </div>
                <div
                    class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-2xl font-semibold text-transparent sm:w-4/5 md:w-3/5 lg:mt-9 lg:w-11/12 lg:text-4xl lg:leading-tight"
                >
                    Wir sind für dich da
                </div>
                <p class="mt-4 text-sm font-medium text-slate-600 sm:w-1/2 lg:w-11/12">
                    Melde dich bei unserem engagierten Entwicklerteam, wenn du Unterstützung brauchst, eine
                    Zusammenarbeit planst oder Fragen hast. Wir helfen dir gern weiter und bearbeiten deine Anfrage
                    schnellstmöglich. <br>Mit freundlichen Grüßen - <strong>Dein Websters Team</strong>
                </p>
            </div>
            <x-form
                no-separator="true"
                class="flex flex-col gap-y-6 sm:mx-auto sm:w-2/3 lg:mx-0 lg:w-full lg:gap-y-5"
                x-data="{ loading: false }"
                x-on:submit.prevent="
                    loading = true;
                    $wire.save().then(() => {
                        loading = false;
                    }).catch(() => {
                        loading = false;
                    })
                "
            >
                <div class="flex flex-col gap-y-3 lg:gap-y-5">
                    <div class="grid gap-y-3 lg:grid-cols-2 lg:gap-x-3 lg:gap-y-0">
                        <div class="flex w-full flex-col">

                            <div>
                                <x-input
                                    required="true"
                                    label="Name"
                                    wire:model="name"
                                    id="text"
                                    name="text"
                                    type="text"
                                    placeholder="Vollständiger Name"
                                />
                            </div>
                        </div>
                        <div class="flex w-full flex-col">
                            <div
                            >
                                <x-input
                                    label="Firma"
                                    wire:model="company"
                                    id="text"
                                    name="text"
                                    type="text"
                                    placeholder="Firmenname"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full flex-col">
                        <div
                        >
                            <x-input
                                label="Email-Adresse"
                                required="true"
                                wire:model="email"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Email-Adresse"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col">

                        <x-textarea
                            label="Nachricht"
                            wire:model="message"
                            id="message"
                            name="message"
                            type="textarea"
                            cols="2"
                            rows="5"
                            placeholder="Persönliche Nachricht"
                        ></x-textarea>
                    </div>
                </div>
                <x-slot:actions>
                    <button
                        type="submit"
                        class="btn items-center justify-center whitespace-nowrap text-sm font-medium font-poppins bg-primary text-white px-5 py-2 rounded-xl flex self-end"
                        x-bind:disabled="loading"
                    >
                        <span
                            x-show="loading"
                            class="loading loading-spinner w-5 h-5"
                        ></span>

                        <span x-show="!loading">
                Senden
            </span>
                    </button>
                </x-slot:actions>
            </x-form>
        </div>
    </div>
    <img
        class="absolute left-0 top-0 -z-10 h-52 w-full object-cover object-left-bottom lg:h-full lg:w-1/2"
        src="{{asset('/assets/form.png')}}"
        alt="Features"
    />
</section>

