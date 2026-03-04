<?php

namespace App\Filament\Resources\Service\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('type')
                            ->options([
                                'main'        => 'Main Service',
                                'specialized' => 'Specialized Service',
                            ])
                            ->required()
                            ->default('main'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon (Emoji or Class)')
                            ->helperText('e.g., 💦, 🧱, or a fontawesome class')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->maxLength(65535),
                        Forms\Components\Repeater::make('features')
                            ->simple(
                                Forms\Components\TextInput::make('feature')->required()
                            )
                            ->label('Service Features'),
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
