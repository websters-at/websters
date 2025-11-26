<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Volt::route('/projects', 'projects.index')
    ->name('projects');

Volt::route('/imprint', 'imprint.index')
    ->name('imprint');

Volt::route('/data-privacy', 'data-privacy.index')
    ->name('data-privacy');

Volt::route('/terms', 'terms.index')
    ->name('terms');
