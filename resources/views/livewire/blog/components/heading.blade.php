<?php
use Livewire\Volt\Component;

new class extends Component {
    public string $level = 'h2';
    public string $text;

    public function mount(string $level = 'h2', string $text = '')
    {
        $this->level = $level;
        $this->text = $text;
    }
}
?>

@if ($level === 'h2')
    <h2 class="mt-6 text-2xl font-semibold text-slate-900 lg:mt-8 lg:text-3xl">
        {{ $text }}
    </h2>
@elseif ($level === 'h3')
    <h3 class="mt-5 text-xl font-semibold text-slate-800 lg:text-2xl">
        {{ $text }}
    </h3>
@else
    <h4 class="mt-4 text-lg font-semibold text-slate-800 lg:text-xl">
        {{ $text }}
    </h4>
@endif
