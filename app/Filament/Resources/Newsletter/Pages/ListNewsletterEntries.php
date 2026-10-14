<?php

namespace App\Filament\Resources\Newsletter\Pages;

use App\Filament\Resources\Newsletter\NewsletterEntryResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListNewsletterEntries extends ListRecords
{
    protected static string $resource = NewsletterEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('CSV Export')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn () => response()->streamDownload(function () {
                    $out = fopen('php://output', 'w');
                    fputcsv($out, ['email', 'angemeldet_am'], ';');
                    \App\Models\NewsletterEntry::orderBy('created_at')->chunk(500, function ($entries) use ($out) {
                        foreach ($entries as $entry) {
                            fputcsv($out, [$entry->email, $entry->created_at?->format('Y-m-d H:i:s')], ';');
                        }
                    });
                    fclose($out);
                }, 'newsletter-' . now()->format('Y-m-d') . '.csv')),
        ];
    }
}
