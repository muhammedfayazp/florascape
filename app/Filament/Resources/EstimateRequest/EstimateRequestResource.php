<?php

namespace App\Filament\Resources\EstimateRequest;

use App\Filament\Resources\EstimateRequest\Pages;
use App\Filament\Resources\EstimateRequest\Schemas\EstimateRequestForm;
use App\Filament\Resources\EstimateRequest\Tables\EstimateRequestTable;
use App\Models\EstimateRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EstimateRequestResource extends Resource
{
    protected static ?string $model = EstimateRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentCurrencyDollar;

    protected static ?string $recordTitleAttribute = 'Leads';

    public static function form(Schema $schema): Schema
    {
        return EstimateRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstimateRequestTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListEstimateRequests::route('/'),
            'create' => Pages\CreateEstimateRequest::route('/create'),
            'view'   => Pages\ViewEstimateRequest::route('/{record}'),
            'edit'   => Pages\EditEstimateRequest::route('/{record}/edit'),
        ];
    }
}
