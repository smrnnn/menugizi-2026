<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KategoriUsiaResource\Pages;
use App\Filament\Admin\Resources\KategoriUsiaResource\RelationManagers;
use App\Models\KategoriUsia;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriUsiaResource extends Resource
{
    protected static ?string $model = KategoriUsia::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Kelompok Usia';
    protected static ?string $navigationGroup = 'Data Gizi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Kelompok')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')->required(),
                    Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('usia_min_bulan')->numeric()->required(),
                    Forms\Components\TextInput::make('usia_max_bulan')->numeric()->required(),
                ]),

            Forms\Components\Section::make('Angka Kecukupan Gizi Harian (Permenkes No. 28/2019)')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('kalori_harian')
                        ->numeric()->suffix('kcal')->required(),
                    Forms\Components\TextInput::make('protein_harian')
                        ->numeric()->suffix('g')->required(),
                    // ⭐ Field yang sebelumnya belum ada di form
                    Forms\Components\TextInput::make('lemak_harian')
                        ->numeric()->suffix('g')->required(),
                    Forms\Components\TextInput::make('karbohidrat_harian')
                        ->numeric()->suffix('g')->required(),
                    Forms\Components\TextInput::make('serat_harian')
                        ->numeric()->suffix('g')->required(),
                    Forms\Components\TextInput::make('air_harian')
                        ->numeric()->suffix('ml')->required(),
                ]),

            Forms\Components\Textarea::make('catatan_khusus')
                ->rows(2)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('usia_min_bulan')->label('Min (bln)'),
                Tables\Columns\TextColumn::make('usia_max_bulan')->label('Maks (bln)'),
                Tables\Columns\TextColumn::make('kalori_harian')->suffix(' kcal'),
                Tables\Columns\TextColumn::make('protein_harian')->suffix(' g'),
                Tables\Columns\TextColumn::make('lemak_harian')->suffix(' g'),
                Tables\Columns\TextColumn::make('karbohidrat_harian')->suffix(' g'),
                Tables\Columns\TextColumn::make('serat_harian')->suffix(' g'),
                Tables\Columns\TextColumn::make('air_harian')->suffix(' ml'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListKategoriUsias::route('/'),
            'create' => Pages\CreateKategoriUsia::route('/create'),
            'edit'   => Pages\EditKategoriUsia::route('/{record}/edit'),
        ];
    }
}