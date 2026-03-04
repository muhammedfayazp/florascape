<?php

namespace App\Filament\Resources\Slider\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlider extends EditRecord
{
    protected static string $resource = SliderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
