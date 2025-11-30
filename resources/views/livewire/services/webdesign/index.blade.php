<?php

use Livewire\Volt\Component;

new class extends Component {

    public function mount(): void
    {
        SEOMeta::setTitle('Wedesign');
        SEOMeta::setTitle('Professionelles Webdesign in Linz | Website Pakete & Preise | Websters');
        SEOMeta::setDescription('Webdesign Linz: Professionelle Website-Pakete zu fairen Preisen. Starter (990€), Komplett (1.990€) & Premium (2.990€) inkl. SEO, Responsive Design & Laravel Entwicklung. Jetzt Angebot anfordern!');
        SEOMeta::setCanonical('https://websters.at/services/webdesign');
        SEOMeta::addKeyword(['Webdesign Linz', 'Website erstellen Linz', 'Webagentur Linz', 'Website Pakete', 'Webdesign Preise', 'Laravel Entwicklung', 'Responsive Webdesign', 'SEO Optimierung']);

        OpenGraph::setTitle('Professionelles Webdesign in Linz | Website Pakete & Preise | Websters');
        OpenGraph::setDescription('Webdesign Linz: Professionelle Website-Pakete zu fairen Preisen. Starter, Komplett & Premium inkl. SEO, Responsive Design & Laravel Entwicklung. Jetzt Angebot anfordern!');
        OpenGraph::setUrl('https://websters.at/services/webdesign');
        OpenGraph::setSiteName('Websters Webagentur');
        OpenGraph::setType('website');
        OpenGraph::addImage('https://websters.at/assets/website.png');
    }

}; ?>

<div>
    <livewire:services.webdesign.components.intro />
    <livewire:services.webdesign.components.website-package />
    <livewire:services.webdesign.components.process />
    <livewire:services.webdesign.components.website-pricing />
    <livewire:services.webdesign.components.contact/>

    <livewire:services.webdesign.components.qa/>
    <livewire:home.components.newsletter/>




</div>
