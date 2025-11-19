<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <x-menu class="border border-base-content/10 !w-64">
        <x-menu-item title="Home" icon="o-home" class="text-secondary" icon-classes="text-secondary" />
        <x-menu-item title="Messages" icon="o-envelope" badge="1" badge-classes="badge-soft badge-error" />
        <x-menu-item title="My settings" icon="o-bolt" badge="new" badge-classes="float-right" />
    </x-menu>
</div>
