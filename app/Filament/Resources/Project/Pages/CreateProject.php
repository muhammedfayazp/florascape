<?php

namespace App\Filament\Resources\Project\Pages;

use App\Filament\Resources\Project\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;
}
