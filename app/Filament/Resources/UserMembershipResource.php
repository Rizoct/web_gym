<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserMembershipResource\Pages;
use App\Models\UserMembership;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class UserMembershipResource extends Resource
{
    protected static ?string $model = UserMembership::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('membership_type')
                    ->options(['daily' => 'Daily', 'monthly' => 'Monthly'])
                    ->required(),
                Forms\Components\TextInput::make('duration')->numeric()->required(),
                Forms\Components\TextInput::make('total_price')->numeric()->required(),
                Forms\Components\DateTimePicker::make('start_date'),
                Forms\Components\DateTimePicker::make('end_date'),
                Forms\Components\Toggle::make('approved')
                    ->label('Approve Membership'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->sortable(),
                Tables\Columns\TextColumn::make('membership_type'),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('total_price'),
                Tables\Columns\BooleanColumn::make('approved'),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserMemberships::route('/'),
            'edit' => Pages\EditUserMembership::route('/{record}/edit'),
        ];
    }
}
