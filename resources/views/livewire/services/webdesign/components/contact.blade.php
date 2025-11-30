<?php

use App\Models\WebsitePackage;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use App\Models\Lead;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public string $name = "";
    public string $email = "";
    public string $company = "";
    public string $message = "";
    public int $package;

    #[On('package-selected')]
    public function updatePackageForm($package_id): void
    {
        $this->package = $package_id;
    }

    public array $packages = [
        [
            "id" => 1,
            "name" => "Website Starter"
        ],
        [
            "id" => 2,
            "name" => "Website Komplett"
        ],
        [
            "id" => 3,
            "name" => "Website Premium"
        ]
    ];

    public function save(): void
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'package' => 'required'
        ]);

        try {
            $package_id = intval($this->package);
            $package = $this->packages[$package_id - 1]['name'];
            WebsitePackage::create([
                "name" => $this->name,
                "email" => $this->email,
                "company" => $this->company,
                "message" => $this->message,
                "package" => $package,
            ]);

            $this->toast(
                type: 'success',
                title: 'Erfolg!',
                description: 'Vielen Dank für deine Anfrage. Wir melden uns bald bei dir.',
                position: 'toast-bottom toast-end',
                icon: 'o-check-circle',
                css: 'alert-success',
                timeout: 3000,
                redirectTo: null
            );

            $this->reset(['name', 'company', 'email', 'message', 'package']);

        } catch (\Exception $err) {
            $this->reset(['name', 'company', 'email', 'message', 'package']);
            $this->toast(
                type: 'error',
                title: 'Hoppla – etwas ist schiefgegangen',
                description: 'Bitte versuch es erneut.',
                position: 'toast-bottom toast-end',
                icon: 'o-x-circle',
                css: 'alert-error',
                timeout: 3000,
                redirectTo: null
            );
        }
    }
}; ?>

<section class="pt-12 mt-10 lg:mt-16 lg:pt-16 relative pb-6 lg:pb-16" id="webdesign-contact">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div id="contact"
             class="grid gap-y-6 md:px-4 lg:grid-cols-2 lg:items-center lg:gap-x-12 lg:gap-y-0 lg:px-8 xl:gap-x-16">

            <div class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left">
                <div
                    class="inline-flex items-center justify-center rounded-full font-poppins font-medium text-white badge badge-secondary badge-lg sm:badge-xl px-2 py-1 text-xs sm:px-3 sm:py-1.5 sm:text-sm">
                    Angebot sichern
                </div>

                <div
                    class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-2xl font-semibold text-transparent sm:w-4/5 md:w-3/5 lg:mt-9 lg:w-11/12 lg:text-4xl lg:leading-tight">
                    Interesse an einem Paket? Sag uns, welches du willst
                </div>

                <p class="mt-4 text-sm font-medium text-slate-600 sm:w-1/2 lg:w-11/12">
                    Wähle dein Wunschpaket und schick uns eine Nachricht – wir melden uns schnellstmöglich mit einem
                    passenden Angebot zurück.
                </p>
            </div>

            <x-form no-separator="true"
                    class="flex flex-col gap-y-2 sm:mx-auto sm:w-2/3 lg:mx-0 lg:w-full lg:gap-y-2"
                    x-data="{ loading: false }"
                    x-on:submit.prevent="
                loading = true;
                $wire.save().then(() => { loading = false }).catch(() => { loading = false });
              ">
                <div class="flex flex-col gap-y-3 lg:gap-y-5">
                    <div class="grid gap-y-3 lg:grid-cols-2 lg:gap-x-3 lg:gap-y-0">
                        <div class="flex w-full flex-col">
                            <x-input required="true" label="Name" wire:model="name" type="text"
                                     placeholder="Dein voller Name"/>
                        </div>
                        <div class="flex w-full flex-col">
                            <x-input label="Firma (optional)" wire:model="company" type="text"
                                     placeholder="Firmenname"/>
                        </div>
                    </div>
                    <div class="flex w-full flex-col">
                        <x-input required="true" label="E-Mail Adresse" wire:model="email" type="email"
                                 placeholder="Email Adresse"/>
                    </div>

                    <!-- Paket Auswahl -->
                    <div class="flex w-full flex-col">
                        <x-select
                            required="true"
                            label="Website Paket"
                            wire:model="package"
                            :options="$packages"
                            placeholder="Wähle ein Paket aus"
                        />
                    </div>

                    <div class="flex flex-col">
                        <x-textarea label="Nachricht (optional)" wire:model="message"
                                    placeholder="Deine Wünsche oder Details..."/>
                    </div>
                </div>

                <x-slot:actions>
                    <button type="submit"
                            class="btn-fancy btn items-center justify-center whitespace-nowrap text-sm font-medium font-poppins bg-primary text-white px-5 py-2 rounded-xl flex self-end"
                            x-bind:disabled="loading">
                        <span x-show="loading" class="loading loading-spinner w-5 h-5"></span>
                        <span x-show="!loading">Absenden</span>
                    </button>
                </x-slot:actions>
            </x-form>

        </div>
    </div>

    <img class="absolute left-0 top-0 -z-10 h-52 w-full object-cover object-left-bottom lg:h-full lg:w-1/2"
         src="{{ asset('/assets/form.png') }}"
         alt="Shape Background"/>
</section>
