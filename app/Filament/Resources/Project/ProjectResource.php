<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Project\Pages;
use App\Filament\Resources\Project\Schemas\ProjectForm;
use App\Filament\Resources\Project\Tables\ProjectsTable;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
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
class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;
    protected static string|UnitEnum |null $navigationGroup = 'Site Content';
    protected static ?string $recordTitleAttribute = 'Project';

    public static function form(Schema $schema): Schema
    {
        return ProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
