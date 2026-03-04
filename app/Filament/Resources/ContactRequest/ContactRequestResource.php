<?php

namespace App\Filament\Resources\ContactRequest;

use App\Filament\Resources\ContactRequest\Pages\CreateContactRequest;
use App\Filament\Resources\ContactRequest\Pages\EditContactRequest;
use App\Filament\Resources\ContactRequest\Pages\ListContactRequests;
use App\Filament\Resources\ContactRequest\Schemas\ContactRequestForm;
use App\Filament\Resources\ContactRequest\Tables\ContactRequestTable;
use App\Models\ContactRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
class ContactRequestResource extends Resource
{

 protected static ?string $model = ContactRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'Marketing';

    public static function form(Schema $schema): Schema
    {
        return ContactRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactRequestTable::configure($table);
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
            'index' => ListContactRequests::route('/'),
            'create' => CreateContactRequest::route('/create'),
            'edit' => EditContactRequest::route('/{record}/edit'),
        ];
    }





}
