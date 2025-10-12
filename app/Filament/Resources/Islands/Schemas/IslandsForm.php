<?php

namespace App\Filament\Resources\Islands\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IslandsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
