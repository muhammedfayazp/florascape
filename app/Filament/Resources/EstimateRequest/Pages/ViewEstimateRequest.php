<?php

namespace App\Filament\Resources\EstimateRequest\Pages;

use App\Filament\Resources\EstimateRequest\EstimateRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEstimateRequest extends ViewRecord
{
    protected static string $resource = EstimateRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
