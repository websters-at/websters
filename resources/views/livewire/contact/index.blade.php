<?php

use Livewire\Volt\Component;

new class extends Component {
    public function mount(): void
    {
        SEOMeta::setTitle('Kontakt - Websters Webagentur Linz | Webdesign & Entwicklung');
        SEOMeta::setDescription('Kontaktieren Sie Websters für Webdesign, Softwareentwicklung und digitale Lösungen aus Linz. Wir beraten Sie gerne zu Ihrem Projekt!');
        SEOMeta::setCanonical('https://websters.at/contact');

        OpenGraph::setTitle('Kontakt - Websters Webagentur Linz | Webdesign & Entwicklung');
        OpenGraph::setDescription('Kontaktieren Sie Websters für Webdesign, Softwareentwicklung und digitale Lösungen aus Linz. Wir beraten Sie gerne zu Ihrem Projekt!');
        OpenGraph::setUrl('https://websters.at/contact');
        OpenGraph::setSiteName('Websters Webagentur');
        OpenGraph::setType('website');
        OpenGraph::addImage('https://websters.at/assets/websters-full-logo.png');
    }
}; ?>
<div>
    <livewire:contact.components.cal/>
    <livewire:contact.components.contact-data/>
    <livewire:home.components.newsletter/>



</div>
