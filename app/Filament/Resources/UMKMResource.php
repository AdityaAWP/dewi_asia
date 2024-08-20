<?php
namespace App\Filament\Resources;

use App\Models\UMKM;
use Filament\Resources\Resource;
use App\Filament\Resources\UMKMResource\Pages;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class UMKMResource extends Resource
{
    protected static ?string $model = UMKM::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getLabel(): string
    {
        return 'UMKM';
    }

    public static function getPluralLabel(): string
    {
        return 'Daftar UMKM';
    }

    public static function form(Form $form): Form
    {
         return $form
            ->schema([
                TextInput::make('nama_umkm')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nomor_umkm')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_umkm')->sortable()->searchable(),
                TextColumn::make('nomor_umkm')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUMKMS::route('/'),
            'create' => Pages\CreateUMKM::route('/create'),
            'edit' => Pages\EditUMKM::route('/{record}/edit'),
        ];
    }
}
