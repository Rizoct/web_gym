<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPelatihResource\Pages;
use App\Models\JadwalPelatih;
use App\Models\Pelatih;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn; 
use Filament\Forms\Components\Repeater;

class JadwalPelatihResource extends Resource
{
    protected static ?string $model = JadwalPelatih::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    
    protected static ?string $label = 'Jadwal Pelatih';

    protected static ?string $pluralLabel = 'Jadwal Pelatih';

    protected static ?string $navigationGroup = 'Manajemen Pelatih';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('pelatih_id')
                    ->label('Pelatih')
                    ->options(Pelatih::all()->pluck('Nama', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('Tanggal')->required(),
                TimePicker::make('JamMulai')->required(),
                TimePicker::make('JamSelesai')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('pelatih.Nama')->label('Pelatih')->sortable()->searchable(),
                TextColumn::make('Tanggal')->date(),
                TextColumn::make('JamMulai')->time(),
                TextColumn::make('JamSelesai')->time(),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalPelatihs::route('/'),
            'create' => Pages\CreateJadwalPelatih::route('/create'),
            'edit' => Pages\EditJadwalPelatih::route('/{record}/edit'),
        ];
    }
}
