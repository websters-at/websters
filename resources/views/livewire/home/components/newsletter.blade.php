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
            );
            $this->reset(['email']);
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
            );
        }
    }
}; ?>

<section
    class="pt-12 lg:pt-16 pb-12 lg:pb-16"
    x-data="{ show: false }"
    x-intersect="show = true"
>
    <div class="max-w-7xl mx-auto px-4 xl:px-0">

        <div
            class="relative flex flex-col items-center rounded-2xl px-4 pb-4 pt-16 lg:rounded-[3rem] lg:pb-16 lg:pt-24 overflow-hidden fade-up"
            :class="{ 'show': show }"
            style="transition-delay:.1s"
        >

            <!-- Background Aurora -->
            <div
                class="absolute inset-0 -z-10 pointer-events-none"
                style="
                    background:
                        radial-gradient(ellipse 80% 60% at 70% 20%, rgba(77, 200, 232, 0.85), transparent 68%),
                        radial-gradient(ellipse 70% 60% at 20% 80%, rgba(255, 122, 192, 0.75), transparent 68%),
                        linear-gradient(180deg, #f7eaff 0%, #fde2ea 100%);
                "
            ></div>

            <!-- Headline -->
            <div
                class="mx-auto mt-6 text-center text-2xl text-brand-dark font-poppins font-bold sm:w-1/2 md:w-2/5 lg:mt-9 lg:text-4xl lg:leading-tight xl:w-1/3 fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.25s"
            >
                Lust auf Angebote? <br> Trage dich ein
            </div>

            <!-- Form -->
            <form
                class="mt-6 w-full flex flex-col gap-y-2 sm:w-1/2 md:w-2/5 lg:mt-9 lg:flex-row lg:items-center lg:gap-x-4 lg:gap-y-0 xl:w-2/5 fade-up"
                :class="{ 'show': show }"
                style="transition-delay:.4s"
            >
                <!-- Input -->
                <div class="flex-1 flex flex-col">
                    <div class="group relative rounded-xl border border-neutral-200 bg-white transition-all hover:bg-neutral-50">
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

                <!-- Button -->
                <div x-data="{ loading: false }" class="flex justify-end w-full lg:w-auto">
                    <button
                        type="button"
                        class="btn-fancy btn items-center justify-center whitespace-nowrap text-sm font-medium font-poppins bg-primary text-white px-5 py-2 rounded-xl flex fade-up"
                        :class="{ 'show': show }"
                        style="transition-delay:.55s"
                        x-bind:disabled="loading"
                        @click="
                            loading = true;
                            $wire.save()
                                .then(() => loading = false)
                                .catch(() => loading = false)
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
