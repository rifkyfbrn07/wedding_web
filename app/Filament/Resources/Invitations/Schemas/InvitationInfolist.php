<?php

namespace App\Filament\Resources\Invitations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InvitationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('slug'),
                TextEntry::make('bride_name'),
                TextEntry::make('bride_father')
                    ->placeholder('-'),
                TextEntry::make('bride_mother')
                    ->placeholder('-'),
                TextEntry::make('groom_name'),
                TextEntry::make('groom_father')
                    ->placeholder('-'),
                TextEntry::make('groom_mother')
                    ->placeholder('-'),
                TextEntry::make('akad_start_at')
                    ->dateTime(),
                TextEntry::make('akad_end_at')
                    ->dateTime(),
                TextEntry::make('reception_start_at')
                    ->dateTime(),
                TextEntry::make('reception_end_at')
                    ->dateTime(),
                TextEntry::make('venue_name'),
                TextEntry::make('venue_address')
                    ->columnSpanFull(),
                TextEntry::make('maps_url')
                    ->placeholder('-'),
                TextEntry::make('music_path')
                    ->placeholder('-'),
                ImageEntry::make('cover_image')
                    ->placeholder('-'),
                TextEntry::make('bride_photo')
                    ->placeholder('-'),
                TextEntry::make('groom_photo')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
