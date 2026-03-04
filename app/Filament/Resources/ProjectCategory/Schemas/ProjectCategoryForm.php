<?php

namespace App\Filament\Resources\ProjectCategory\Schemas;

use Filament\Forms;
// use Filament\Forms\Components\Actions\Action;
// use Filament\Forms\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state,   \Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('icon')
                    ->label('Icon (Emoji)')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
