<?php

namespace App\Filament\Resources\CalculatorOption;

use App\Filament\Resources\CalculatorOption\Pages\CreateCalculatorOption;
use App\Filament\Resources\CalculatorOption\Pages\EditCalculatorOption;
use App\Filament\Resources\CalculatorOption\Pages\ListCalculatorOptions;
use App\Filament\Resources\CalculatorOption\Schemas\CalculatorOptionForm;
use App\Filament\Resources\CalculatorOption\Tables\CalculatorOptionTable;
use App\Models\CalculatorOption;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalculatorOptionResource extends Resource
{
    protected static ?string $model = CalculatorOption::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalculator;

    protected static ?string $recordTitleAttribute = 'Site Content';

    public static function form(Schema $schema): Schema
    {
        return CalculatorOptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CalculatorOptionTable::configure($table);
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
            'index' => ListCalculatorOptions::route('/'),
            'create' => CreateCalculatorOption::route('/create'),
            'edit' => EditCalculatorOption::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
