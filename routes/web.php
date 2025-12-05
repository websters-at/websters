<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Volt::route('/projekte', 'projects.index')
    ->name('projects');

Volt::route('/kontakt', 'contact.index')
    ->name('contact');

Volt::route('/ueber-uns', 'about.index')
    ->name('about');

Volt::route('/leistungen', 'services.index')
    ->name('services');

Volt::route('/leistungen/webdesign', 'services.webdesign.index')
    ->name('webdesign');

Volt::route('/leistungen/consulting', 'services.it-consulting.index')
    ->name('consulting');

Volt::route('/leistungen/software', 'services.custom-software.index')
    ->name('software');

Volt::route('/leistungen/design', 'services.design.index')
    ->name('design');

Volt::route('/leistungen/cloud', 'services.cloud.index')
    ->name('cloud');

Volt::route('/impressum', 'imprint.index')
    ->name('imprint');

Volt::route('/datenschutz', 'data-privacy.index')
    ->name('data-privacy');

Volt::route('/agbs', 'terms.index')
    ->name('terms');

Volt::route('/{any}', 'errors.404')
    ->where('any', '.*')
    ->name('not-found');

