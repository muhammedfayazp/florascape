<?php

namespace App\Filament\Resources\CalculatorOptionResource\Pages;

use App\Filament\Resources\CalculatorOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalculatorOption extends EditRecord
{
    protected static string $resource = CalculatorOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
