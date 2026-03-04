<?php

namespace App\Filament\Resources\ContactRequest\Pages;

use App\Filament\Resources\ContactRequest\ContactRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactRequest extends CreateRecord
{
    protected static string $resource = ContactRequestResource::class;
}
