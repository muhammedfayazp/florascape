<?php

namespace App\Filament\Resources\CalculatorOption\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CalculatorOptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Calculator Option Details')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->options([
                                'property_type' => 'Property Type (Multiplier)',
                                'service'        => 'Service (AED per Sq. Ft.)',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('value')
                            ->label('Value')
                            ->helperText('For Property Type, this is a multiplier (e.g. 1.2). For Service, this is AED per Sq. Ft.')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon/Emoji')
                            ->maxLength(191),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->required(),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }
}
