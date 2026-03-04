<?php

namespace App\Filament\Resources\EstimateRequest\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EstimateRequestTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y')
                    ->sortable(),
                TextColumn::make('user_name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('property_type')
                    ->badge()
                    ->searchable(),
                TextColumn::make('square_feet')
                    ->label('Area (Sq. Ft.)')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('estimate_average')
                    ->label('Avg. Estimate')
                    ->money('AED')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new'       => 'primary',
                        'contacted' => 'warning',
                        'quoted'    => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default     => 'gray',
                    })
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new'       => 'New',
                        'contacted' => 'Contacted',
                        'quoted'    => 'Quoted',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                // TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
