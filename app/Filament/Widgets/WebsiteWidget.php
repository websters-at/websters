<?php

namespace App\Filament\Widgets;

use Filament\Facades\Filament;
use Filament\Widgets\Widget;

class WebsiteWidget extends Widget
{
    protected string $view = 'filament.widgets.website-widget';
    // Determines display order on the dashboard [citation:4][citation:10]
    protected static ?int $sort = 1;

    // If false, the widget loads with the page, not lazily [citation:4]
    protected static bool $isLazy = false;

    // Controls widget visibility [citation:4][citation:10]
    public static function canView(): bool
    {
        return Filament::auth()->check();
    }

}
