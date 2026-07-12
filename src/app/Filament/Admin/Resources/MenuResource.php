<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MenuResource\Pages;
use App\Models\KategoriUsia;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;
    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $navigationLabel = 'Menu';
    protected static ?string $navigationGroup = 'Data Gizi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Menu')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(150)
                        ->columnSpan(2),

                    Forms\Components\Select::make('kategori_usia_id')
                        ->label('Kelompok Usia')
                        ->options(KategoriUsia::pluck('nama', 'id'))
                        ->required()
                        ->searchable(),

                    Forms\Components\Select::make('waktu_makan')
                        ->options([
                            'sarapan'     => 'Sarapan',
                            'makan_siang' => 'Makan Siang',
                            'makan_malam' => 'Makan Malam',
                            'selingan'    => 'Selingan',
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('deskripsi')
                        ->columnSpan(2)
                        ->rows(2),

                    Forms\Components\FileUpload::make('foto')
                        ->image()
                        ->directory('menu')
                        ->columnSpan(2),
                ]),

            Forms\Components\Section::make('Kandungan Gizi per Sajian')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('kalori')
                        ->numeric()->suffix('kcal')->required(),
                    Forms\Components\TextInput::make('protein')
                        ->numeric()->suffix('g')->required(),
                    Forms\Components\TextInput::make('lemak')
                        ->numeric()->suffix('g')->required(),
                    Forms\Components\TextInput::make('karbohidrat')
                        ->numeric()->suffix('g')->required(),
                    // ⭐ Field yang sebelumnya belum ada
                    Forms\Components\TextInput::make('serat')
                        ->numeric()->suffix('g')->required()->default(0),
                    Forms\Components\TextInput::make('air')
                        ->numeric()->suffix('ml')->required()->default(0),
                    Forms\Components\TextInput::make('zat_besi')
                        ->numeric()->suffix('mg')->required()->default(0),
                ]),

            Forms\Components\Section::make('Resep')
                ->schema([
                    Forms\Components\Textarea::make('bahan')
                        ->rows(4)
                        ->helperText('Satu bahan per baris'),
                    Forms\Components\Textarea::make('cara_masak')
                        ->rows(4),
                ]),

            Forms\Components\Section::make('Alergen & Status')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('alergens')
                        ->label('Mengandung Alergen')
                        ->relationship('alergens', 'nama')
                        ->multiple()
                        ->preload()
                        ->searchable(),

                    Forms\Components\Toggle::make('is_aktif')
                        ->label('Aktif ditampilkan')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')->circular(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kategoriUsia.nama')->label('Kelompok Usia')->badge(),
                Tables\Columns\TextColumn::make('waktu_makan')->badge(),
                Tables\Columns\TextColumn::make('kalori')->suffix(' kcal')->sortable(),
                Tables\Columns\TextColumn::make('serat')->suffix(' g')->sortable(),
                Tables\Columns\TextColumn::make('air')->suffix(' ml')->sortable(),
                Tables\Columns\IconColumn::make('is_aktif')->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_usia_id')
                    ->label('Kelompok Usia')
                    ->options(KategoriUsia::pluck('nama', 'id')),
                Tables\Filters\SelectFilter::make('waktu_makan')
                    ->options([
                        'sarapan'     => 'Sarapan',
                        'makan_siang' => 'Makan Siang',
                        'makan_malam' => 'Makan Malam',
                        'selingan'    => 'Selingan',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit'   => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}