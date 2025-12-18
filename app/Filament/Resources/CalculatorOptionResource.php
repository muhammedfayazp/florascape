<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalculatorOptionResource\Pages;
use App\Filament\Resources\CalculatorOptionResource\RelationManagers;
use App\Models\CalculatorOption;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalculatorOptionResource extends Resource
{
    protected static ?string $model = CalculatorOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';
    protected static ?string $navigationGroup = 'Site Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Calculator Option Details')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->options([
                                'property_type' => 'Property Type (Multiplier)',
                                'service' => 'Service (AED per Sq. Ft.)',
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
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'property_type' => 'warning',
                        'service' => 'success',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'property_type' => 'Property Type',
                        'service' => 'Service',
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
            ])
            ->defaultSort('type', 'desc');
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
            'index' => Pages\ListCalculatorOptions::route('/'),
            'create' => Pages\CreateCalculatorOption::route('/create'),
            'edit' => Pages\EditCalculatorOption::route('/{record}/edit'),
        ];
    }
}
