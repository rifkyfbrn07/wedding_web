<?php

namespace App\Filament\Resources\Invitations\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InvitationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('bride_name')
                    ->required(),
                TextInput::make('bride_father'),
                TextInput::make('bride_mother'),
                TextInput::make('groom_name')
                    ->required(),
                TextInput::make('groom_father'),
                TextInput::make('groom_mother'),
                DateTimePicker::make('akad_start_at')
                    ->required(),
                DateTimePicker::make('akad_end_at')
                    ->required(),
                DateTimePicker::make('reception_start_at')
                    ->required(),
                DateTimePicker::make('reception_end_at')
                    ->required(),
                TextInput::make('venue_name')
                    ->required(),
                Textarea::make('venue_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('maps_url')
                    ->url(),
                TextInput::make('music_path'),
                FileUpload::make('cover_image')
                    ->image(),
                TextInput::make('bride_photo'),
                TextInput::make('groom_photo'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
