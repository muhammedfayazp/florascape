<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRequestResource\Pages;
use App\Filament\Resources\ContactRequestResource\RelationManagers;
use App\Models\ContactRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Marketing';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Inquiry Details')
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
                    ])->columns(2),

                Forms\Components\Section::make('Admin Action')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'new' => 'New / Unread',
                                'contacted' => 'Contacted',
                                'in_progress' => 'In Progress',
                                'closed' => 'Closed',
                            ])
                            ->required()
                            ->default('new'),
                        Forms\Components\Textarea::make('admin_notes')
                            ->placeholder('Add notes about your interaction with the client...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new' => 'danger',
                        'contacted' => 'info',
                        'in_progress' => 'warning',
                        'closed' => 'success',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'in_progress' => 'In Progress',
                        'closed' => 'Closed',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactRequests::route('/'),
            'create' => Pages\CreateContactRequest::route('/create'),
            'edit' => Pages\EditContactRequest::route('/{record}/edit'),
        ];
    }
}
