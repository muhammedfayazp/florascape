<?php

namespace App\Filament\Resources\PageSection\Pages;

use App\Filament\Resources\PageSection\PageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPageSections extends ListRecords
{
    protected static string $resource = PageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
