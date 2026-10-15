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
        ['/webdesign-graz', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-salzburg', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-innsbruck', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-klagenfurt', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-st-poelten', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-eisenstadt', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/webdesign-bregenz', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/domain-check', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/seo-check', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/cookie-check', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/passwort-generator', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/utm-builder', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/kontrast-checker', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/qr-generator', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/tools/favicon-generator', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/ratgeber/website-kosten-oesterreich', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/ratgeber/webdesign-angebot-vergleich', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/ratgeber/nis2-oesterreich-kmu', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen/anwalt-kanzlei-website', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen/arzt-praxis-website', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen/gastro-restaurant-website', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen/handwerk-website', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen/immobilien-website', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        ['/branchen/hotel-tourismus-website', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
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

Volt::route('/webdesign-graz', 'cities.graz')
    ->name('webdesign.graz');

Volt::route('/webdesign-salzburg', 'cities.salzburg')
    ->name('webdesign.salzburg');

Volt::route('/webdesign-innsbruck', 'cities.innsbruck')
    ->name('webdesign.innsbruck');

Volt::route('/webdesign-klagenfurt', 'cities.klagenfurt')
    ->name('webdesign.klagenfurt');

Volt::route('/webdesign-st-poelten', 'cities.st-poelten')
    ->name('webdesign.stpoelten');

Volt::route('/webdesign-eisenstadt', 'cities.eisenstadt')
    ->name('webdesign.eisenstadt');

Volt::route('/webdesign-bregenz', 'cities.bregenz')
    ->name('webdesign.bregenz');

Volt::route('/tools/domain-check', 'tools.domain-check')
    ->name('tools.domain');

// ARCHIVIERT (Preis-Rechner pausiert): Route + Datei bleiben erhalten,
// Reaktivieren = Redirect entfernen + Sitemap/Gate/Footer/llms zurück.
Route::redirect('/tools/preis-rechner', '/tools', 301);
// Volt::route('/tools/preis-rechner', 'tools.preis-rechner')
//     ->name('tools.calculator');

Volt::route('/tools/seo-check', 'tools.seo-check')
    ->name('tools.seo');

Volt::route('/tools/cookie-check', 'tools.cookie-check')
    ->name('tools.cookies');

Volt::route('/tools/passwort-generator', 'tools.passwort-generator')
    ->name('tools.password');

Volt::route('/tools/utm-builder', 'tools.utm-builder')
    ->name('tools.utm');

Volt::route('/tools/kontrast-checker', 'tools.kontrast-checker')
    ->name('tools.contrast');

Volt::route('/tools/qr-generator', 'tools.qr-generator')
    ->name('tools.qr');

Volt::route('/tools/favicon-generator', 'tools.favicon-generator')
    ->name('tools.favicon');

Volt::route('/tools', 'tools.index')
    ->name('tools.index');

Volt::route('/ratgeber/website-kosten-oesterreich', 'guides.kosten')
    ->name('guides.kosten');

Volt::route('/ratgeber/webdesign-angebot-vergleich', 'guides.vergleich')
    ->name('guides.vergleich');

Volt::route('/ratgeber/nis2-oesterreich-kmu', 'guides.nis2')
    ->name('guides.nis2');

Volt::route('/branchen', 'branchen.index')
    ->name('branchen.index');

Volt::route('/branchen/anwalt-kanzlei-website', 'branchen.anwalt')
    ->name('branchen.anwalt');

Volt::route('/branchen/arzt-praxis-website', 'branchen.arzt')
    ->name('branchen.arzt');

Volt::route('/branchen/gastro-restaurant-website', 'branchen.gastro')
    ->name('branchen.gastro');

Volt::route('/branchen/handwerk-website', 'branchen.handwerk')
    ->name('branchen.handwerk');

Volt::route('/branchen/immobilien-website', 'branchen.immobilien')
    ->name('branchen.immobilien');

Volt::route('/branchen/hotel-tourismus-website', 'branchen.hotel')
    ->name('branchen.hotel');

Volt::route('/impressum', 'imprint.index')
    ->name('imprint');

Volt::route('/datenschutz', 'data-privacy.index')
    ->name('data-privacy');

Volt::route('/agbs', 'terms.index')
    ->name('terms');


Route::fallback(function () {
    return response()->view('livewire.errors.404', [], 404);
});
