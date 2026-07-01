<?php

namespace App\Filament\Resources\Invitations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvitationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('bride_name')
                    ->searchable(),
                TextColumn::make('bride_father')
                    ->searchable(),
                TextColumn::make('bride_mother')
                    ->searchable(),
                TextColumn::make('groom_name')
                    ->searchable(),
                TextColumn::make('groom_father')
                    ->searchable(),
                TextColumn::make('groom_mother')
                    ->searchable(),
                TextColumn::make('akad_start_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('akad_end_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('reception_start_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('reception_end_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('venue_name')
                    ->searchable(),
                TextColumn::make('maps_url')
                    ->searchable(),
                TextColumn::make('music_path')
                    ->searchable(),
                ImageColumn::make('cover_image'),
                TextColumn::make('bride_photo')
                    ->searchable(),
                TextColumn::make('groom_photo')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
