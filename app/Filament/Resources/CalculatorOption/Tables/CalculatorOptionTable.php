<?php

namespace App\Filament\Resources\CalculatorOption\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CalculatorOptionTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'property_type' => 'warning',
                        'service'       => 'success',
                        default         => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('icon')
                    ->label('Icon'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'property_type' => 'Property Type',
                        'service'       => 'Service',
                    ]),
                // TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('type', 'desc');
    }
}
