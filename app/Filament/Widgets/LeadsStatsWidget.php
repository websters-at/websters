<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use App\Models\NewsletterEntry;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LeadsStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $leadsWeek = Lead::where('created_at', '>=', now()->subDays(7))->count();
        $leadsToday = Lead::whereDate('created_at', today())->count();

        return [
            Stat::make('Anfragen gesamt', Lead::count())
                ->description($leadsToday . ' heute · ' . $leadsWeek . ' letzte 7 Tage')
                ->descriptionIcon('heroicon-o-envelope')
                ->color('success'),
            Stat::make('Newsletter-Abos', NewsletterEntry::count())
                ->description('aktive Einträge')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('info'),
        ];
    }
}
