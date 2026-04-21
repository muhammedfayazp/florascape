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
                Tabs::make('Site Settings')
                    ->tabs([

                        // ─── TAB 1: General ───────────────────────────────
                        Tab::make('⚙️  General')
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
                                            ->required()
                                            ->placeholder('Florascape')
                                            ->helperText('Appears in browser tabs, emails, and the footer.'),

                                        Forms\Components\FileUpload::make('favicon')
                                            ->label('Favicon (Browser Tab Icon)')
                                            ->helperText('Upload a square image (recommended: 32×32 or 64×64 PNG/ICO). Shown in browser tabs.')
                                            ->image()
                                            ->disk('s3')
                                            ->directory('settings')
                                            ->imagePreviewHeight('80')
                                            ->openable()
                                            ->downloadable()
                                            ->acceptedFileTypes(['image/png', 'image/x-icon', 'image/vnd.microsoft.icon', 'image/jpeg', 'image/webp']),
                                    ]),
                            ]),

                        // ─── TAB 2: SEO ───────────────────────────────────
                        Tab::make('🔍  SEO')
                            ->schema([
                                Section::make('Search Engine Settings')
                                    ->description('These appear in Google search results and browser tabs.')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->label('Default Page Title')
                                            ->placeholder('Florascape – Premium Landscaping Services in UAE')
                                            ->helperText('Keep under 60 characters for best SEO results.')
                                            ->maxLength(80),

                                        Forms\Components\Textarea::make('meta_description')
                                            ->label('Default Meta Description')
                                            ->placeholder('Transform your outdoor space with Florascape...')
                                            ->helperText('Keep between 120–160 characters. This is the snippet shown in Google results.')
                                            ->rows(3)
                                            ->maxLength(300),

                                        Forms\Components\TextInput::make('meta_keywords')
                                            ->label('Keywords (comma-separated)')
                                            ->placeholder('landscaping UAE, garden design Dubai, pool maintenance')
                                            ->helperText('Optional. Less important for modern SEO but still used by some search engines.'),
                                    ]),

                                Section::make('Social Media Share Image (OG Image)')
                                    ->description('This image appears when someone shares your website on Facebook, WhatsApp, LinkedIn, etc.')
                                    ->schema([
                                        Forms\Components\FileUpload::make('og_image')
                                            ->label('Social Share Image')
                                            ->helperText('Recommended size: 1200×630 pixels (JPG or PNG). Will be shown as the preview image on social media.')
                                            ->image()
                                            ->disk('s3')
                                            ->directory('settings')
                                            ->imagePreviewHeight('200')
                                            ->openable()
                                            ->downloadable()
                                            ->imageEditor()
                                            ->imageCropAspectRatio('1.91:1'),
                                    ]),
                            ]),

                        // ─── TAB 3: Contact & Business ────────────────────
                        Tab::make('📞  Contact & Business')
                            ->schema([
                                Section::make('Contact Information')
                                    ->description('These details appear in the website footer, contact page, and structured data for Google.')
                                    ->schema([
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Phone Number')
                                            ->tel()
                                            ->placeholder('+971 50 123 4567')
                                            ->helperText('Displayed in the footer and contact page.'),

                                        Forms\Components\TextInput::make('email')
                                            ->label('Email Address')
                                            ->email()
                                            ->placeholder('hello@florascape.ae')
                                            ->helperText('Displayed in the footer and contact page.'),

                                        Forms\Components\Textarea::make('address')
                                            ->label('Physical Address')
                                            ->placeholder("Florascape Landscape LLC\nAbu Dhabi, UAE")
                                            ->helperText('Displayed in footer and contact page. Press Enter for new lines.')
                                            ->rows(3),
                                    ])
                                    ->columns(2),

                                Section::make('Footer Branding')
                                    ->description('Customize the footer\'s text and copyright notice.')
                                    ->schema([
                                        Forms\Components\TextInput::make('footer_tagline')
                                            ->label('Footer Tagline')
                                            ->placeholder('Transforming outdoor spaces into living works of art.')
                                            ->helperText('Short description shown under your logo in the footer.'),

                                        Forms\Components\TextInput::make('footer_copyright')
                                            ->label('Copyright Text (optional override)')
                                            ->placeholder('© 2025 Florascape Landscape LLC. All rights reserved.')
                                            ->helperText('Leave blank to use the auto-generated copyright with current year.'),
                                    ]),
                            ]),

                        // ─── TAB 4: Social Media ──────────────────────────
                        Tab::make('🔗  Social Media')
                            ->schema([
                                Section::make('Social Media Links')
                                    ->description('Link your social profiles. These appear as icons in the footer.')
                                    ->schema([
                                        Forms\Components\TextInput::make('facebook_url')
                                            ->label('Facebook Page URL')
                                            ->url()
                                            ->placeholder('https://www.facebook.com/florascape')
                                            ->prefixIcon('heroicon-o-globe-alt'),

                                        Forms\Components\TextInput::make('instagram_url')
                                            ->label('Instagram Profile URL')
                                            ->url()
                                            ->placeholder('https://www.instagram.com/florascape')
                                            ->prefixIcon('heroicon-o-globe-alt'),

                                        Forms\Components\TextInput::make('linkedin_url')
                                            ->label('LinkedIn Page URL')
                                            ->url()
                                            ->placeholder('https://www.linkedin.com/company/florascape')
                                            ->prefixIcon('heroicon-o-globe-alt'),

                                        Forms\Components\TextInput::make('whatsapp_number')
                                            ->label('WhatsApp Number')
                                            ->placeholder('971501234567')
                                            ->helperText('Enter number with country code but WITHOUT the + sign. Example: 971501234567'),
                                    ])
                                    ->columns(2),
                            ]),

                        // ─── TAB 5: Sections Visibility ───────────────────
                        Tab::make('👁️  Page Sections')
                            ->schema([
                                Section::make('Homepage Section Visibility')
                                    ->description('Control which sections appear on the homepage. Only admins can see hidden sections.')
                                    ->schema([
                                        Forms\Components\Toggle::make('show_calculator')
                                            ->label('Show Cost Calculator Section')
                                            ->helperText('The "Get Your Free Instant Estimate" calculator widget. Turn OFF to hide it from visitors (you can still see it when logged in as admin).')
                                            ->onColor('success')
                                            ->offColor('warning')
                                            ->default(true)
                                            ->inline(false),
                                    ]),
                            ]),

                        // ─── TAB 6: Analytics & Tracking ─────────────────
                        Tab::make('📊  Analytics')
                            ->schema([
                                Section::make('Tracking & Analytics')
                                    ->description('Add tracking IDs to measure website traffic and user behavior.')
                                    ->schema([
                                        Forms\Components\TextInput::make('google_analytics_id')
                                            ->label('Google Analytics Measurement ID')
                                            ->placeholder('G-XXXXXXXXXX')
                                            ->helperText('Found in your Google Analytics 4 property settings. Starts with "G-".'),

                                        Forms\Components\TextInput::make('gtm_id')
                                            ->label('Google Tag Manager Container ID')
                                            ->placeholder('GTM-XXXXXXX')
                                            ->helperText('Found in your GTM account. Starts with "GTM-". Use this if you also use GTM for other tags.'),
                                    ])
                                    ->columns(2),

                                Section::make('Custom Code (Advanced)')
                                    ->description('Add custom scripts for tracking pixels, chat widgets, etc. Only use if you know what you are doing.')
                                    ->schema([
                                        Forms\Components\Textarea::make('header_scripts')
                                            ->label('Custom Header Scripts')
                                            ->helperText('Code added inside the <head> tag of every page. Useful for meta pixels, heatmaps, etc.')
                                            ->rows(5)
                                            ->placeholder('<script>/* your code here */</script>'),

                                        Forms\Components\Textarea::make('footer_scripts')
                                            ->label('Custom Footer Scripts')
                                            ->helperText('Code added just before </body> on every page. Good for live chat widgets.')
                                            ->rows(5)
                                            ->placeholder('<script>/* your code here */</script>'),
                                    ]),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
