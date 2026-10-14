<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('Name')->required()->maxLength(100),
                TextInput::make('email')->label('E-Mail')->email()->required()->maxLength(255),
                TextInput::make('company')->label('Firma')->maxLength(150),
                Textarea::make('message')->label('Nachricht')->rows(5)->maxLength(5000)->columnSpanFull(),
            ]);
    }
}
