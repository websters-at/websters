<?php

use Livewire\Volt\Component;

new class extends Component {

    public function mount(): void
    {
        SEOMeta::setTitle('Websters - Webagentur Linz | Webdesign & Softwareentwicklung');
        SEOMeta::setDescription('Websters - Deine Webagentur aus Linz. Wir entwickeln moderne Websites, Web-Apps & Custom Software mit Laravel, Livewire & Python. Individuelle Lösungen von 3 HTL-Absolventen. Jetzt Projekt besprechen!');
        SEOMeta::setCanonical('https://websters.at');
        SEOMeta::addKeyword(['Webagentur Linz', 'Webdesign Linz', 'Softwareentwicklung Linz', 'Laravel Entwicklung', 'Webentwicklung Österreich', 'Custom Software', 'Python Entwicklung', 'Web Apps']);

        OpenGraph::setTitle('Websters - Webagentur Linz | Webdesign & Softwareentwicklung');
        OpenGraph::setDescription('Deine Webagentur aus Linz für moderne Websites, Web-Apps & Custom Software. Laravel, Livewire & Python Entwicklung von 3 HTL-Absolventen.');
        OpenGraph::setUrl('https://websters.at/');
        OpenGraph::setSiteName('Websters Webagentur');
        OpenGraph::setType('website');
        OpenGraph::addImage('https://websters.at/assets/people/stevan.png');
        OpenGraph::addImage('https://websters.at/assets/websters-full-logo.png', ['height' => 630, 'width' => 1200]);

    }

}; ?>


<div>

    <livewire:home.components.hero/>

    <livewire:home.components.about/>
    <livewire:home.components.technologies/>
    <livewire:home.components.team/>
    <livewire:home.components.services/>
    <livewire:home.components.contact/>
    <livewire:home.components.qa/>
    <livewire:home.components.newsletter/>


</div>
