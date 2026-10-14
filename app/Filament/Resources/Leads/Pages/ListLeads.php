<?php

namespace App\Filament\Resources\Leads\Pages;

use App\Filament\Resources\Leads\LeadResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLeads extends ListRecords
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('CSV Export')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn () => response()->streamDownload(function () {
                    $out = fopen('php://output', 'w');
                    fputcsv($out, ['name', 'email', 'firma', 'nachricht', 'eingang'], ';');
                    \App\Models\Lead::orderBy('created_at')->chunk(500, function ($leads) use ($out) {
                        foreach ($leads as $lead) {
                            fputcsv($out, [$lead->name, $lead->email, $lead->company, $lead->message, $lead->created_at?->format('Y-m-d H:i:s')], ';');
                        }
                    });
                    fclose($out);
                }, 'anfragen-' . now()->format('Y-m-d') . '.csv')),
            CreateAction::make()->label('Anfrage anlegen'),
        ];
    }
}
