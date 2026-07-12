<?php

namespace App\Filament\Widgets;

use App\Models\Menu;
use App\Models\KategoriUsia;
use App\Models\Alergen;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NutriKidsStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Menu', Menu::count())
                ->description(Menu::where('is_aktif', true)->count() . ' aktif')
                ->descriptionIcon('heroicon-m-cake')
                ->color('success'),

            Stat::make('Kelompok Usia', KategoriUsia::count())
                ->description('Standar Kemenkes RI')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Jenis Alergen', Alergen::count())
                ->description('Terdaftar dalam sistem')
                ->descriptionIcon('heroicon-m-shield-exclamation')
                ->color('warning'),

            Stat::make('Menu Makan Utama', Menu::where('waktu_makan', '!=', 'selingan')->count())
                ->description(Menu::where('waktu_makan', 'selingan')->count() . ' selingan')
                ->descriptionIcon('heroicon-m-clock')
                ->color('primary'),
        ];
    }
}