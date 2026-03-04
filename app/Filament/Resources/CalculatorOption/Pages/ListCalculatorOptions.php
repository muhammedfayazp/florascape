<?php

namespace App\Filament\Resources\CalculatorOption\Pages;

use App\Filament\Resources\CalculatorOption\CalculatorOptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCalculatorOptions extends ListRecords
{
    protected static string $resource = CalculatorOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
