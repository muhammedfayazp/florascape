<?php

namespace App\Filament\Resources\CalculatorOptionResource\Pages;

use App\Filament\Resources\CalculatorOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalculatorOptions extends ListRecords
{
    protected static string $resource = CalculatorOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
