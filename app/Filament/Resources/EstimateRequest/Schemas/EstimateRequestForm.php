<?php

namespace App\Filament\Resources\EstimateRequest\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EstimateRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Customer Information')
                            ->schema([
                                Forms\Components\TextInput::make('user_name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('user_email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('user_phone')
                                    ->label('Phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(191),
                            ])
                            ->columnSpan(1),

                        Section::make('Project Details')
                            ->schema([
                                Forms\Components\TextInput::make('property_type')
                                    ->required()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('square_feet')
                                    ->label('Area (Sq. Ft.)')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TagsInput::make('services')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(1),

                        Section::make('Status & Notes')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'new'       => 'New',
                                        'contacted' => 'Contacted',
                                        'quoted'    => 'Quoted',
                                        'completed' => 'Completed',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->required()
                                    ->default('new'),
                                Forms\Components\Textarea::make('admin_notes')
                                    ->rows(5)
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(1),

                        Section::make('Estimate Summary')
                            ->schema([
                                Forms\Components\TextInput::make('estimate_min')
                                    ->label('Min (AED)')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('estimate_max')
                                    ->label('Max (AED)')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('estimate_average')
                                    ->label('Average (AED)')
                                    ->required()
                                    ->numeric(),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
