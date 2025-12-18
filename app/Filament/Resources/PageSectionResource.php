<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSectionResource\Pages;
use App\Filament\Resources\PageSectionResource\RelationManagers;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Site Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Section Identification')
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
                    ])->columns(3),

                Forms\Components\Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->maxLength(191),
                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(191),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('page-sections'),
                    ]),

                Forms\Components\Section::make('Detailed Content Items')
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
                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? ($state['description'] ? substr($state['description'], 0, 50) . '...' : null)),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPageSections::route('/'),
            'create' => Pages\CreatePageSection::route('/create'),
            'edit' => Pages\EditPageSection::route('/{record}/edit'),
        ];
    }
}
