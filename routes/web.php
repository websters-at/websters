<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Volt::route('/projects', 'projects.index')
    ->name('projects');

Volt::route('/contact', 'contact.index')
    ->name('contact');

Volt::route('/about', 'about.index')
    ->name('about');

Volt::route('/services', 'services.index')
    ->name('services');

Volt::route('/services/webdesign', 'services.webdesign.index')
    ->name('webdesign');

Volt::route('/services/consulting', 'services.it-consulting.index')
    ->name('consulting');

Volt::route('/services/software', 'services.custom-software.index')
    ->name('software');

Volt::route('/imprint', 'imprint.index')
    ->name('imprint');

Volt::route('/data-privacy', 'data-privacy.index')
    ->name('data-privacy');

Volt::route('/terms', 'terms.index')
    ->name('terms');

Volt::route('/{any}', 'errors.404')
    ->where('any', '.*')
    ->name('not-found');

