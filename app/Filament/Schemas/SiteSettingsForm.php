<?php

namespace App\Filament\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SiteSettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Settings')
                    ->tabs([

                        Tab::make('General')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Section::make('Site Status')
                                    ->description('Control whether your website is publicly visible.')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_published')
                                            ->label('Website is Live (Published)')
                                            ->helperText('Turn this OFF to show a maintenance page to all visitors.')
                                            ->onColor('success')
                                            ->offColor('danger')
                                            ->inline(false),
                                    ]),

                                Section::make('Basic Information')
                                    ->description('Core identity of your website.')
                                    ->schema([
                                        Forms\Components\TextInput::make('site_name')
                                            ->label('Site / Brand Name')
                                            ->helperText('Appears in browser tabs, emails, and the footer.')
                                            ->maxLength(191),
                                    ]),
                            ]),

                        Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('SEO Configuration')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(191),
                                        Forms\Components\Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(3),
                                        Forms\Components\TextInput::make('meta_keywords')
                                            ->label('Meta Keywords'),
                                        Forms\Components\FileUpload::make('og_image')
                                            ->label('OG Image (Social Share Image)')
                                            ->helperText('Recommended size: 1200×630px')
                                            ->image()
                                            ->disk('s3')
                                            ->directory('settings')
                                            ->openable()
                                            ->downloadable(),
                                    ]),
                            ]),

                        Tab::make('Contact & Business')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Section::make('Business Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Phone')
                                            ->tel(),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email(),
                                        Forms\Components\Textarea::make('address')
                                            ->label('Address')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Section::make('Social Media Links')
                                    ->schema([
                                        Forms\Components\TextInput::make('facebook_url')
                                            ->label('Facebook URL')
                                            ->url(),
                                        Forms\Components\TextInput::make('instagram_url')
                                            ->label('Instagram URL')
                                            ->url(),
                                        Forms\Components\TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->url(),
                                        Forms\Components\TextInput::make('whatsapp_number')
                                            ->label('WhatsApp Number')
                                            ->helperText('Include country code without + (e.g., 971501234567)'),
                                    ])->columns(2),
                            ]),

                        Tab::make('Page Visibility')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Section::make('Homepage Section Visibility')
                                    ->description('Control which sections appear on the homepage.')
                                    ->schema([
                                        Forms\Components\Toggle::make('show_calculator')
                                            ->label('Show Cost Calculator Section')
                                            ->helperText('The "Get Your Free Instant Estimate" calculator widget.')
                                            ->inline(false),
                                        // Forms\Components\Toggle::make('show_gallery')
                                        //     ->label('Show Gallery / Portfolio Section')
                                        //     ->helperText('The project gallery section on the homepage.')
                                        //     ->inline(false),
                                        // Forms\Components\Toggle::make('show_why_choose_us')
                                        //     ->label('Show "Why Choose Us" Section')
                                        //     ->inline(false),
                                        // Forms\Components\Toggle::make('show_services')
                                        //     ->label('Show Services / Expertise Section')
                                        //     ->inline(false),
                                    ]),

                                Section::make('Tracking & Scripts')
                                    ->schema([
                                        Forms\Components\TextInput::make('google_analytics_id')
                                            ->label('Google Analytics ID (G-XXXXXX)'),
                                        Forms\Components\TextInput::make('gtm_id')
                                            ->label('Google Tag Manager ID (GTM-XXXXXX)'),
                                        Forms\Components\Textarea::make('header_scripts')
                                            ->label('Custom Header Scripts')
                                            ->helperText('Added inside <head>')
                                            ->columnSpanFull(),
                                        Forms\Components\Textarea::make('footer_scripts')
                                            ->label('Custom Footer Scripts')
                                            ->helperText('Added before </body>')
                                            ->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                    ])
                    ->columnSpanFull(),
            ]);
    }
}
