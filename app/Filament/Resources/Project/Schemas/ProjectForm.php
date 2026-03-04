<?php

namespace App\Filament\Resources\Project\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('project_category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Category'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->maxLength(65535),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('projects')
                    ->required(),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_visible_on_homepage')
                    ->label('Visible on Homepage')
                    ->default(true),
            ]);
    }
}
