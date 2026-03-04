<?php

namespace App\Filament\Resources\PageSection;

use App\Filament\Resources\PageSection\Pages;
use App\Filament\Resources\PageSection\Schemas\PageSectionForm;
use App\Filament\Resources\PageSection\Tables\PageSectionTable;
use App\Filament\Resources\PageSectionResource\RelationManagers;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BackedEnum;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|UnitEnum |null $navigationGroup = 'Site Content';

    protected static ?string $recordTitleAttribute = 'Page';

    public static function form(Schema $schema): Schema
    {
        return PageSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageSectionTable::configure($table);
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
