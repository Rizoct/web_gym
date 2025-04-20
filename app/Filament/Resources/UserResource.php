<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Select;
use App\Models\Pelatih;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required(),

                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->required(),

                        Toggle::make('is_approved')
                            ->label('Approved')
                            ->helperText('Only approved users can log in'),
                        
                        Select::make('pelatih_id')
                            ->label('Assigned Pelatih')
                            ->options(Pelatih::all()->pluck('Nama', 'id'))
                            ->searchable()
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Approval Status')
                    ->trueLabel('Approved')
                    ->falseLabel('Pending Approval'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkAction::make('approve')
                    ->label('Approve Selected')
                    ->action(fn (Collection $records) => $records->each->update(['is_approved' => true]))
                    ->requiresConfirmation()
                    ->deselectRecordsAfterCompletion(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
