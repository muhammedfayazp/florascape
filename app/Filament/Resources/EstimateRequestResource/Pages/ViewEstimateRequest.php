<?php

namespace App\Filament\Resources\EstimateRequestResource\Pages;

use App\Filament\Resources\EstimateRequestResource;
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
