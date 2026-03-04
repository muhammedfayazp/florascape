<?php

namespace App\Filament\Resources\PageSection\Pages;

use App\Filament\Resources\PageSection\PageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPageSection extends EditRecord
{
    protected static string $resource = PageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
