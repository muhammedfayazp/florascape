<?php

namespace App\Filament\Resources\EstimateRequest\Pages;

use App\Filament\Resources\EstimateRequest\EstimateRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstimateRequest extends EditRecord
{
    protected static string $resource = EstimateRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
