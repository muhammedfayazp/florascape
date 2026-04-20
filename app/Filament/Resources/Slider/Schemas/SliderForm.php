<?php

namespace App\Filament\Resources\Slider\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->placeholder('homepage, aboutpage, footer, etc.')
                    ->maxLength(255),

                Forms\Components\Repeater::make('slides')
                    ->label('Slides')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('slides')
                            ->disk('s3')
                            ->openable()
                            ->downloadable()
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\Textarea::make('description')
                            ->rows(2)
                            ->nullable(),
                        Forms\Components\TextInput::make('link')
                            ->label('Redirect URL')
                            ->url()
                            ->placeholder('https://example.com')
                            ->nullable(),
                        Forms\Components\TextInput::make('cta_text')
                            ->label('Button Text')
                            ->placeholder('Contact Us')
                            ->nullable(),
                    ])
                    ->collapsible()
                    ->minItems(1)
                    ->columns(1)
                    ->addActionLabel('Add Slide'),
            ]);
    }
}
