<?php

namespace App\Filament\Resources\ProjectCategory\Pages;

use App\Filament\Resources\ProjectCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectCategory extends EditRecord
{
    protected static string $resource = ProjectCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
