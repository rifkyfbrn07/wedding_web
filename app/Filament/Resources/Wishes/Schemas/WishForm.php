<?php

namespace App\Filament\Resources\Wishes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class WishForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('invitation_id')
                    ->relationship('invitation', 'id')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_approved')
                    ->required(),
                TextInput::make('ip_address'),
            ]);
    }
}
