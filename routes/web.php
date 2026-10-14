<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Volt::route('/', 'home.index')
    ->name('home');

Volt::route('/projekte', 'projects.index')
    ->name('projects');

Volt::route('/kontakt', 'contact.index')
    ->name('contact');

// About lives at /#team (nav links there since 2026-09); keep the old URL working.
Route::redirect('/ueber-uns', '/#team', 301);

Route::get('/sitemap.xml', function () {
    // Dynamische Sitemap (Single Source of Truth): nur indexierbare Routen.
    // Design-/Cloud-Stubs sind noindex und bleiben bewusst draußen.
    $pages = [
        // [path, priority, changefreq]
        ['/', 1.0, Url::CHANGE_FREQUENCY_WEEKLY],
        ['/leistungen', 0.9, Url::CHANGE_FREQUENCY_WEEKLY],
        ['/leistungen/webdesign', 0.9, Url::CHANGE_FREQUENCY_WEEKLY],
        ['/leistungen/software', 0.9, Url::CHANGE_FREQUENCY_WEEKLY],
        ['/leistungen/consulting', 0.9, Url::CHANGE_FREQUENCY_WEEKLY],
        ['/projekte', 0.8, Url::CHANGE_FREQUENCY_WEEKLY],
        ['/kontakt', 0.8, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-linz', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-wels', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-steyr', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-wien', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/domain-check', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/preis-rechner', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/seo-check', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/cookie-check', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/ratgeber/website-kosten-oesterreich', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/ratgeber/webdesign-angebot-vergleich', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools', 0.6, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/impressum', 0.3, Url::CHANGE_FREQUENCY_YEARLY],
        ['/datenschutz', 0.3, Url::CHANGE_FREQUENCY_YEARLY],
        ['/agbs', 0.3, Url::CHANGE_FREQUENCY_YEARLY],
    ];

    $sitemap = Sitemap::create();
    foreach ($pages as [$path, $priority, $freq]) {
        $sitemap->add(
            Url::create($path)
                ->setLastModificationDate(now())
                ->setChangeFrequency($freq)
                ->setPriority($priority)
        );
    }

    return $sitemap->toResponse(request());
})->name('sitemap');

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

Volt::route('/webdesign-linz', 'cities.linz')
    ->name('webdesign.linz');

Volt::route('/webdesign-wels', 'cities.wels')
    ->name('webdesign.wels');

Volt::route('/webdesign-steyr', 'cities.steyr')
    ->name('webdesign.steyr');

Volt::route('/webdesign-wien', 'cities.wien')
    ->name('webdesign.wien');

Volt::route('/tools/domain-check', 'tools.domain-check')
    ->name('tools.domain');

Volt::route('/tools/preis-rechner', 'tools.preis-rechner')
    ->name('tools.calculator');

Volt::route('/tools/seo-check', 'tools.seo-check')
    ->name('tools.seo');

Volt::route('/tools/cookie-check', 'tools.cookie-check')
    ->name('tools.cookies');

Volt::route('/tools', 'tools.index')
    ->name('tools.index');

Volt::route('/ratgeber/website-kosten-oesterreich', 'guides.kosten')
    ->name('guides.kosten');

Volt::route('/ratgeber/webdesign-angebot-vergleich', 'guides.vergleich')
    ->name('guides.vergleich');

Volt::route('/impressum', 'imprint.index')
    ->name('imprint');

Volt::route('/datenschutz', 'data-privacy.index')
    ->name('data-privacy');

Volt::route('/agbs', 'terms.index')
    ->name('terms');


Route::fallback(function () {
    return response()->view('livewire.errors.404', [], 404);
});
