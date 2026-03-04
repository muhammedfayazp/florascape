<?php

namespace App\Filament\Resources\ContactRequest\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Inquiry Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->readOnly(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->readOnly(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->readOnly(),
                        Forms\Components\TextInput::make('subject')
                            ->readOnly(),
                        Forms\Components\Textarea::make('message')
                            ->readOnly()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Admin Action')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'new'         => 'New / Unread',
                                'contacted'   => 'Contacted',
                                'in_progress' => 'In Progress',
                                'closed'      => 'Closed',
                            ])
                            ->required()
                            ->default('new'),
                        Forms\Components\Textarea::make('admin_notes')
                            ->placeholder('Add notes about your interaction with the client...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
