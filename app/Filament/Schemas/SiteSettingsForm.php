<?php

namespace App\Filament\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Configuration')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publish Website')
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false),
                        Forms\Components\TextInput::make('site_name')
                            ->label('Site Name')
                            ->required(),
                    ]),

                Section::make('Business Information (Schema.org)')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->tel(),
                        Forms\Components\TextInput::make('email')
                            ->email(),
                        Forms\Components\Textarea::make('address')
                            ->rows(2),
                    ])
                    ->columns(2),

                Section::make('SEO Configuration')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title'),
                        Forms\Components\Textarea::make('meta_description')
                            ->rows(3),
                        Forms\Components\TextInput::make('meta_keywords'),
                        Forms\Components\FileUpload::make('og_image')
                            ->image()
                            ->directory('settings'),
                        Forms\Components\FileUpload::make('favicon')
                            ->image()
                            ->directory('settings'),
                    ])
                    ->columns(1),

                Section::make('Marketing & Tracking')
                    ->schema([
                        Forms\Components\TextInput::make('google_analytics_id')
                            ->label('Google Analytics (G-XXXXXX)'),
                        Forms\Components\TextInput::make('gtm_id')
                            ->label('Google Tag Manager (GTM-XXXXXX)'),
                        Forms\Components\Textarea::make('header_scripts')
                            ->label('Custom Header Scripts')
                            ->helperText('Add tracking codes, pixels, etc. inside <head>'),
                        Forms\Components\Textarea::make('footer_scripts')
                            ->label('Custom Footer Scripts')
                            ->helperText('Add tracking codes before </body>'),
                    ])
                    ->columns(2),

                Section::make('Social Media Links')
                    ->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->url(),
                        Forms\Components\TextInput::make('instagram_url')
                            ->url(),
                        Forms\Components\TextInput::make('linkedin_url')
                            ->url(),
                        Forms\Components\TextInput::make('whatsapp_number')
                            ->helperText('Include country code without + (e.g., 971501234567)'),
                    ])
                    ->columns(2),
            ]);
    }
}
