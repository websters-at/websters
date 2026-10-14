<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('company')
                    ->label('Firma')
                    ->searchable()
                    ->toggleable()
                    ->placeholder('–'),
                TextColumn::make('email')
                    ->label('E-Mail')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('E-Mail kopiert'),
                TextColumn::make('message')
                    ->label('Nachricht')
                    ->limit(60)
                    ->wrap()
                    ->toggleable()
                    ->placeholder('–'),
                TextColumn::make('created_at')
                    ->label('Eingang')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->label('Zeitraum')
                    ->form([DatePicker::make('from')->label('Von'), DatePicker::make('until')->label('Bis')])
                    ->query(fn (Builder $query, array $data) => $query
                        ->when($data['from'] ?? null, fn ($q, $d) => $q->whereDate('created_at', '>=', $d))
                        ->when($data['until'] ?? null, fn ($q, $d) => $q->whereDate('created_at', '<=', $d))),
            ])
            ->recordActions([
                Action::make('reply')
                    ->label('Antworten')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->url(fn ($record) => 'mailto:' . $record->email . '?subject=' . rawurlencode('Re: Deine Anfrage bei Websters'))
                    ->openUrlInNewTab(),
                EditAction::make()->label('Ansehen'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Noch keine Anfragen')
            ->emptyStateDescription('Sobald jemand das Kontaktformular nutzt, landet die Anfrage hier.');
    }
}
