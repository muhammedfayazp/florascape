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
                            ->helperText('Toggle this ON to make the website public. If OFF, visitors will see a "Coming Soon" page.')
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false),
                        \Filament\Forms\Components\TextInput::make('site_name')
                            ->label('Site Name')
                            ->placeholder('Florascape')
                            ->required(),
                    ]),

                Section::make('SEO Configuration')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('meta_title')
                            ->label('Global Meta Title')
                            ->placeholder('Florascape - Premium Landscaping Services')
                            ->helperText('This title will appear in search results and browser tabs.'),
                        \Filament\Forms\Components\Textarea::make('meta_description')
                            ->label('Global Meta Description')
                            ->rows(3)
                            ->placeholder('Premium landscaping and garden maintenance services in Abu Dhabi...')
                            ->helperText('A brief summary of your site for search engines.'),
                        \Filament\Forms\Components\TextInput::make('meta_keywords')
                            ->label('Global Keywords')
                            ->placeholder('landscaping, gardening, abu dhabi, florascape')
                            ->helperText('Comma-separated list of keywords.'),
                        \Filament\Forms\Components\FileUpload::make('og_image')
                            ->label('Social Share Image (OG Image)')
                            ->image()
                            ->directory('settings')
                            ->helperText('Image shown when your site is shared on social media (1200x630 recommended).'),
                        \Filament\Forms\Components\FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('settings')
                            ->helperText('The small icon shown in the browser tab.'),
                    ])->columns(1),
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
