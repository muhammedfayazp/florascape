<?php

namespace App\Filament\Resources\EstimateRequestResource\Pages;

use App\Filament\Resources\EstimateRequestResource;
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
