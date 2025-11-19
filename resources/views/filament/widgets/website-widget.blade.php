<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col items-center justify-center space-y-3 p-3">
            {{-- Your Logo - Much Smaller --}}
            <div class="flex justify-center">
                <img
                    src="{{ asset('/assets/websters-full-logo.png') }}"
                    alt="Your Logo"
                    class="h-6 w-auto"  {{-- Changed from h-16 to h-6 --}}
                >
            </div>

            {{-- Back to Homepage Button --}}
            <div class="flex justify-center">
                <x-filament::button
                    icon="heroicon-o-home"
                    tag="a"
                    href="{{ url('/') }}"
                    color="primary"
                    size="sm"
                >
                    Back to Homepage
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
