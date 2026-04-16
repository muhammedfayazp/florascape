<?php

namespace App\Filament\Resources\ProjectCategory\Pages;

use App\Filament\Resources\ProjectCategory\ProjectCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectCategory extends CreateRecord
{
    protected static string $resource = ProjectCategoryResource::class;
}
