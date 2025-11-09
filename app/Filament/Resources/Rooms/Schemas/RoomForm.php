<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('room_number')
                    ->label(__('Room number'))
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->required(),
                TextInput::make('floor')
                    ->label(__('Floor'))
                    ->maxLength(255)
                    ->required(),
                Textarea::make('description')
                    ->label(__('Description'))
                    ->maxLength(1024)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
