<?php

namespace App\Filament\Resources\EstimateRequest\Pages;

use App\Filament\Resources\EstimateRequest\EstimateRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstimateRequest extends CreateRecord
{
    protected static string $resource = EstimateRequestResource::class;
}
