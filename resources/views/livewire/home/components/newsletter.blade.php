<?php

use App\Models\NewsletterEntry;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public string $email = "";

    public function save(): void
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        try {
            NewsletterEntry::create([
                "email" => $this->email,
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
        } catch (Exception $err) {
            $this->reset(['email']);
            $this->toast(
                type: 'error',
                title: 'Fehler',
                description: 'Scheint so, als hättest du dich schon registiert.',
                position: 'toast-bottom toast-end',
                icon: 'o-x-circle',
                css: 'alert-error',
                timeout: 3000,
                redirectTo: null
            );
        }

    }
}; ?>

<section class="pt-12 lg:pt-16 pb-12 lg:pb-16">
    <div class="max-w-7xl mx-auto px-4 xl:px-0">
        <div
            class="relative flex flex-col items-center rounded-2xl bg-gradient-to-b from-primary/30 via-white/60 to-secondary/30 px-4 pb-4 pt-16 lg:rounded-[3rem] lg:pb-16 lg:pt-24"
        >


            <div
                class="mx-auto mt-6 text-center text-2xl font-semibold text-brand-dark font-poppins font-bold sm:w-1/2 md:w-2/5 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-1/3"
            >
                Lust auf Angebote? <br> Trage dich ein
            </div>
            <form
                class="mt-6 flex w-full flex-col gap-y-2 sm:w-1/2 md:w-2/5 lg:mt-9 lg:flex-row lg:items-center lg:gap-x-4 lg:gap-y-0 xl:w-2/5"
            >
                <div class="flex w-full flex-col">
                    <div
                        class="group relative rounded-xl border border-neutral-200 bg-white transition-all hover:bg-neutral-50"
                    >
                        <x-input
                            id="email"
                            wire:model="email"
                            name="email"
                            type="email"
                            required
                            placeholder="Email Adresse"
                        />
                    </div>
                </div>
                <div x-data="{ loading: false }">
                    {{-- your form fields here, with wire:model etc. --}}
                    <button
                        type="button"
                        class="btn items-center justify-center whitespace-nowrap text-sm font-medium font-poppins bg-primary text-white px-5 py-2 rounded-xl flex self-end"
                        x-bind:disabled="loading"
                        @click="
                            loading = true;
                            $wire.save().then(() => {
                                loading = false;
                            }).catch(() => {
                                loading = false;
                            })
                        "
                    >
                        <span x-show="loading" class="loading loading-spinner w-5 h-5"></span>
                        <span x-show="!loading">Senden</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
