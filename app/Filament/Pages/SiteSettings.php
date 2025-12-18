<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use App\Models\SiteSetting;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Site Settings';
    protected static ?string $title = 'Site Visibility Settings';

    protected static string $view = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::firstOrCreate([], ['is_published' => false]);
        $this->form->fill($settings->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Configuration')
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Publish Website')
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false),
                        \Filament\Forms\Components\TextInput::make('site_name')
                            ->label('Site Name')
                            ->required(),
                    ]),

                Section::make('Business Information (Schema.org)')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('phone')
                            ->tel(),
                        \Filament\Forms\Components\TextInput::make('email')
                            ->email(),
                        \Filament\Forms\Components\Textarea::make('address')
                            ->rows(2),
                    ])->columns(2),

                Section::make('SEO Configuration')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('meta_title'),
                        \Filament\Forms\Components\Textarea::make('meta_description')
                            ->rows(3),
                        \Filament\Forms\Components\TextInput::make('meta_keywords'),
                        \Filament\Forms\Components\FileUpload::make('og_image')
                            ->image()
                            ->directory('settings'),
                        \Filament\Forms\Components\FileUpload::make('favicon')
                            ->image()
                            ->directory('settings'),
                    ])->columns(1),

                Section::make('Marketing & Tracking')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('google_analytics_id')
                            ->label('Google Analytics (G-XXXXXX)'),
                        \Filament\Forms\Components\TextInput::make('gtm_id')
                            ->label('Google Tag Manager (GTM-XXXXXX)'),
                        \Filament\Forms\Components\Textarea::make('header_scripts')
                            ->label('Custom Header Scripts')
                            ->helperText('Add tracking codes, pixels, etc. inside <head>'),
                        \Filament\Forms\Components\Textarea::make('footer_scripts')
                            ->label('Custom Footer Scripts')
                            ->helperText('Add tracking codes before </body>'),
                    ])->columns(2),

                Section::make('Social Media Links')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('facebook_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('instagram_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('linkedin_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('whatsapp_number')
                            ->helperText('Include country code without + (e.g., 971501234567)'),
                    ])->columns(2),
            ])
            ->statePath('data');
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
