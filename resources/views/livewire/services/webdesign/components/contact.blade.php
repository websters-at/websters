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


<section
    class="pt-12 mt-10 lg:mt-16 lg:pt-16 relative pb-6 lg:pb-16"
    id="webdesign-contact"
    x-data="{ show: false }"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <div class="grid gap-y-6 md:px-4 lg:grid-cols-2 lg:items-center lg:gap-x-12 lg:px-8 xl:gap-x-16">

            <!-- LEFT SIDE -->
            <div
                class="flex flex-col items-start sm:items-center sm:text-center lg:items-start lg:text-left fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.1s"
            >
                <div class="inline-flex items-center justify-center rounded-full badge badge-secondary text-white px-3 py-1 text-xs sm:text-sm">
                    Angebot sichern
                </div>

                <div
                    class="mt-8 bg-gradient-to-b from-brand-dark to-slate-600 bg-clip-text text-transparent text-2xl font-bold lg:text-4xl sm:w-4/5 md:w-3/5 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.2s"
                >
                    Interesse an einem Paket? Sag uns, welches du willst
                </div>

                <p
                    class="mt-4 text-sm font-medium text-slate-600 sm:w-1/2 lg:w-11/12 fade-up"
                    :class="{ 'show': show }"
                    style="transition-delay:.3s"
                >
                    Wähle dein Wunschpaket und schick uns eine Nachricht – wir melden uns schnellstmöglich zurück.
                </p>
            </div>

            <!-- FORM START -->
            <x-form
                no-separator="true"
                class="flex flex-col gap-y-2 sm:mx-auto sm:w-2/3 lg:w-full fade-up"
                x-bind:class="{ 'show': show }"
                style="transition-delay:.25s"
                x-data="{ loading: false }"
                x-on:submit.prevent="
        loading = true;
        $wire.save().then(() => loading = false).catch(() => loading = false);
    "
            >
                <div class="flex flex-col gap-y-5">

                    <!-- NAME + COMPANY -->
                    <div class="grid gap-y-3 lg:grid-cols-2 lg:gap-x-3">

                        <div class="fade-up" :class="{ 'show': show }" style="transition-delay:.35s">
                            <x-input
                                required
                                label="Name"
                                wire:model="name"
                                type="text"
                                placeholder="Dein voller Name"
                            />
                        </div>

                        <div class="fade-up" :class="{ 'show': show }" style="transition-delay:.40s">
                            <x-input
                                label="Firma (optional)"
                                wire:model="company"
                                type="text"
                                placeholder="Firmenname"
                            />
                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="fade-up" :class="{ 'show': show }" style="transition-delay:.45s">
                        <x-input
                            required
                            label="E-Mail Adresse"
                            wire:model="email"
                            type="email"
                            placeholder="Email Adresse"
                        />
                    </div>

                    <!-- PACKAGE SELECT -->
                    <div class="fade-up" :class="{ 'show': show }" style="transition-delay:.50s">
                        <x-select
                            required
                            label="Website Paket"
                            wire:model="package"
                            :options="$packages"
                            placeholder="Wähle ein Paket aus"
                        />
                    </div>

                    <!-- MESSAGE -->
                    <div class="fade-up" :class="{ 'show': show }" style="transition-delay:.55s">
                        <x-textarea
                            label="Nachricht (optional)"
                            wire:model="message"
                            placeholder="Deine Wünsche oder Details…"
                        />
                    </div>

                </div>

                <!-- BUTTON (SAFE WRAPPED TO AVOID BLADE ERRORS) -->
                <x-slot:actions>
                    <div class="fade-up" :class="{ 'show': show }" style="transition-delay:.65s">
                        <button
                            type="submit"
                            class="btn-fancy btn bg-primary text-white rounded-xl px-5 py-2 flex items-center gap-x-2"
                            x-bind:disabled="loading"
                        >
                            <span x-show="loading" class="loading loading-spinner w-5 h-5"></span>
                            <span x-show="!loading">Absenden</span>
                        </button>
                    </div>
                </x-slot:actions>

            </x-form>
        </div>
    </div>

    <img
        class="absolute left-0 top-0 -z-10 h-52 w-full object-cover object-left-bottom lg:h-full lg:w-1/2"
        src="{{ asset('/assets/form.png') }}"
        alt="Shape Background"
    />
</section>
