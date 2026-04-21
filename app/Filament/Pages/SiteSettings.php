<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use App\Filament\Schemas\SiteSettingsForm;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?string $navigationLabel = 'Site Settings';
    protected static ?string $title = 'Site Visibility Settings';
    protected string $view = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::firstOrCreate([], ['is_published' => false]);
        $this->form->fill($settings->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return SiteSettingsForm::configure($schema);
    }

    public function getFormStatePath(): string
    {
        return 'data';
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = SiteSetting::first();
        if ($settings) {
            $settings->update($data);
        } else {
            SiteSetting::create($data);
        }

        Notification::make()
            ->success()
            ->title('Settings saved successfully')
            ->send();
    }
}
