<?php

namespace App\Filament\Resources\EstimateRequest\Pages;

use App\Filament\Resources\EstimateRequest\EstimateRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstimateRequests extends ListRecords
{
    protected static string $resource = EstimateRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
