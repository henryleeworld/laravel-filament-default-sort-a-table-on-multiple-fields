<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('room_number')
                    ->label(__('Room number'))
                    ->required()
                    ->live(onBlur: true),
                Forms\Components\TextInput::make('floor')
                    ->label(__('Floor')),
                Forms\Components\Textarea::make('description')
                    ->label(__('Description'))
                    ->maxLength(1024)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('room');
    }

    public static function getNavigationLabel(): string
    {
        return __('Rooms');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room_number')
                    ->label(__('Room number'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('floor')
                    ->label(__('Floor'))
                    ->sortable(),
            ])
            ->defaultSort(function (Builder $query): Builder {
                return $query
                    ->orderBy('floor')
                    ->orderBy('room_number');
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
