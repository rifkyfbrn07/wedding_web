<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvitationResource\Pages;
use App\Models\Invitation;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Schemas\Schema;

class InvitationResource extends Resource
{
    protected static ?string $model = Invitation::class;
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Undangan';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Pasangan Pengantin')->schema([
                TextInput::make('slug')->required()->unique(ignoreRecord: true)->label('Slug URL'),
                TextInput::make('bride_name')->required()->label('Nama Lengkap Mempelai Wanita'),
                TextInput::make('bride_father')->label('Nama Ayah Wanita'),
                TextInput::make('bride_mother')->label('Nama Ibu Wanita'),
                TextInput::make('groom_name')->required()->label('Nama Lengkap Mempelai Pria'),
                TextInput::make('groom_father')->label('Nama Ayah Pria'),
                TextInput::make('groom_mother')->label('Nama Ibu Pria'),
            ])->columns(2),

            Section::make('Waktu Acara')->schema([
                DateTimePicker::make('akad_start_at')->required()->label('Akad — Mulai'),
                DateTimePicker::make('akad_end_at')->required()->label('Akad — Selesai'),
                DateTimePicker::make('reception_start_at')->required()->label('Resepsi — Mulai'),
                DateTimePicker::make('reception_end_at')->required()->label('Resepsi — Selesai'),
            ])->columns(2),

            Section::make('Lokasi')->schema([
                TextInput::make('venue_name')->required()->label('Nama Venue'),
                Textarea::make('venue_address')->required()->rows(4)->label('Alamat Lengkap'),
                TextInput::make('maps_url')->url()->label('Google Maps URL'),
            ]),

            Section::make('Media')->schema([
                FileUpload::make('cover_image')
                    ->image()
                    ->directory('invitations/covers')
                    ->label('Foto Cover'),
                FileUpload::make('bride_photo')
                    ->image()
                    ->directory('invitations/photos')
                    ->label('Foto Mempelai Wanita'),
                FileUpload::make('groom_photo')
                    ->image()
                    ->directory('invitations/photos')
                    ->label('Foto Mempelai Pria'),
                FileUpload::make('music_path')
                    ->acceptedFileTypes(['audio/mpeg', 'audio/mp3', 'audio/wav', 'audio/ogg'])
                    ->directory('invitations/music')
                    ->label('File Musik (MP3/WAV)'),
            ])->columns(2),

            Toggle::make('is_active')->label('Aktif')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')->label('Cover'),
                TextColumn::make('slug')->searchable()->label('Slug'),
                TextColumn::make('bride_name')->searchable()->label('Mempelai Wanita'),
                TextColumn::make('groom_name')->searchable()->label('Mempelai Pria'),
                TextColumn::make('akad_start_at')->dateTime('d M Y H:i')->label('Akad'),
                ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListInvitations::route('/'),
            'create' => Pages\CreateInvitation::route('/create'),
            'edit'   => Pages\EditInvitation::route('/{record}/edit'),
        ];
    }
}
