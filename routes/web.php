<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Volt::route('/projects', 'projects.index')
    ->name('projects');
