<?php

use Livewire\Volt\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

new class extends Component {
    public function mount(): void
    {
        SEOMeta::setTitle('Design');

        // Stub-Seite ohne Inhalte: bis echte Inhalte da sind, nicht indexieren
        // (Thin-Content schadet dem Ranking der gesamten Domain).
        SEOMeta::setRobots('noindex, follow');
    }
};

?>
<div></div>
