<?php

namespace App\Filament\Resources\Rsvps\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RsvpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('invitation_id')
                    ->relationship('invitation', 'id')
                    ->required(),
                Select::make('guest_id')
                    ->relationship('guest', 'name'),
                TextInput::make('name')
                    ->required(),
                Select::make('attendance')
                    ->options(['present' => 'Present', 'not_present' => 'Not present'])
                    ->required(),
                TextInput::make('guest_count')
                    ->required()
                    ->numeric()
                    ->default(1),
                Textarea::make('message')
                    ->columnSpanFull(),
                TextInput::make('ip_address'),
            ]);
    }
}
