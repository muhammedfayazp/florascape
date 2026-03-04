<?php

namespace App\Filament\Resources\PageSection\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section Identification')
                    ->schema([
                        Forms\Components\TextInput::make('section_key')
                            ->required()
                            ->readOnly()
                            ->maxLength(191),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3),

                Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->maxLength(191),
                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(191),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('page-sections'),
                    ]),

                Section::make('Detailed Content Items')
                    ->description('Add paragraphs, feature items, or team members here.')
                    ->schema([
                        Forms\Components\Repeater::make('content')
                            ->label('Items')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Item Title / Name (Optional)')
                                    ->nullable(),
                                Forms\Components\Textarea::make('description')
                                    ->label('Item Text / Role / Description')
                                    ->required()
                                    ->rows(3),
                                Forms\Components\TextInput::make('icon')
                                    ->label('Icon (Emoji or CSS Class)')
                                    ->nullable(),
                                Forms\Components\FileUpload::make('image')
                                    ->label('Item Image (Optional)')
                                    ->image()
                                    ->directory('page-sections-items'),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? ($state['description'] ? substr($state['description'], 0, 50) . '...' : null)),
                    ]),
            ]);
    }
}
