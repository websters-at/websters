<?php

use Livewire\Volt\Component;

new class extends Component {

    public function mount(): void
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Websters – Ihre Webagentur aus Linz. Wir realisieren moderne & performante Websites mit Laravel, Livewire & modernen Technologien. Von Webdesign über Entwicklung bis hin zu Hosting – alles aus einer Hand.');
        SEOMeta::setCanonical('https://websters.at');

        OpenGraph::setTitle('Websters – Ihre Webagentur aus Linz');
        OpenGraph::setDescription('Professionelle Webentwicklung, Webdesign & digitale Lösungen aus einer Hand. Für moderne, performante Websites.');
        OpenGraph::setUrl('https://websters.at/');
        OpenGraph::setSiteName('Websters');
        OpenGraph::setType('website');
        OpenGraph::addImage('https://websters.at/assets/logo.png');


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
