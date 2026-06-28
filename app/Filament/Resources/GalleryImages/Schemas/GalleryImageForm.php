<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('invitation_id')
                ->relationship('invitation', 'bride_name')
                ->required()
                ->label('Undangan'),
            FileUpload::make('path')
                ->image()
                ->directory('gallery')
                ->imagePreviewHeight('150')
                ->required()
                ->label('Upload Foto'),
            TextInput::make('caption')
                ->label('Keterangan (Opsional)'),
            TextInput::make('sort_order')
                ->numeric()
                ->default(0)
                ->label('Urutan'),
            Toggle::make('is_active')
                ->default(true)
                ->label('Tampilkan'),
        ]);
    }
}
