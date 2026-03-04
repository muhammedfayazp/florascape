<?php

namespace App\Filament\Resources\ContactRequest\Pages;

use App\Filament\Resources\ContactRequest\ContactRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactRequest extends EditRecord
{
    protected static string $resource = ContactRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
