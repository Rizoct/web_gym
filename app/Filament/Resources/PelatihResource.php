<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PelatihResource\Pages;
use App\Models\Pelatih;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class PelatihResource extends Resource
{
    protected static ?string $model = Pelatih::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Pelatih';
    
    protected static ?string $pluralLabel = 'Pelatih';

    protected static ?string $navigationGroup = 'Manajemen Pelatih';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('Nama')->required(),
                Textarea::make('Alamat')->required(),
                TextInput::make('NomorHandphone')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('Nama')->sortable()->searchable(),
                TextColumn::make('Alamat')->limit(50),
                TextColumn::make('NomorHandphone'),
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
            'index' => Pages\ListPelatihs::route('/'),
            'create' => Pages\CreatePelatih::route('/create'),
            'edit' => Pages\EditPelatih::route('/{record}/edit'),
        ];
    }
}
