<?php

namespace App\Filament\Resources\CalculatorOption\Pages;

use App\Filament\Resources\CalculatorOption\CalculatorOptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditCalculatorOption extends EditRecord
{
    protected static string $resource = CalculatorOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
