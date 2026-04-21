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

    public bool $is_published = false;
    public string $site_name = '';
    public string $meta_title = '';
    public string $meta_description = '';
    public string $meta_keywords = '';
    public string $phone = '';
    public string $email = '';
    public string $address = '';
    public string $google_analytics_id = '';
    public string $gtm_id = '';
    public string $header_scripts = '';
    public string $footer_scripts = '';
    public string $facebook_url = '';
    public string $instagram_url = '';
    public string $linkedin_url = '';
    public string $whatsapp_number = '';

    // File upload - only og_image
    public array $og_image = [];

    // Visibility flags
    public bool $show_calculator    = true;
    // public bool $show_gallery       = true;
    // public bool $show_why_choose_us = true;
    // public bool $show_services      = true;

    public function mount(): void
    {
        $settings = SiteSetting::firstOrCreate([], ['is_published' => false]);
        $data = $settings->toArray();

        // Convert string path to array for FileUpload
        $this->og_image = !empty($data['og_image']) ? [$data['og_image']] : [];

        $this->fill([
            'is_published'        => $data['is_published'] ?? false,
            'site_name'           => $data['site_name'] ?? '',
            'meta_title'          => $data['meta_title'] ?? '',
            'meta_description'    => $data['meta_description'] ?? '',
            'meta_keywords'       => $data['meta_keywords'] ?? '',
            'phone'               => $data['phone'] ?? '',
            'email'               => $data['email'] ?? '',
            'address'             => $data['address'] ?? '',
            'google_analytics_id' => $data['google_analytics_id'] ?? '',
            'gtm_id'              => $data['gtm_id'] ?? '',
            'header_scripts'      => $data['header_scripts'] ?? '',
            'footer_scripts'      => $data['footer_scripts'] ?? '',
            'facebook_url'        => $data['facebook_url'] ?? '',
            'instagram_url'       => $data['instagram_url'] ?? '',
            'linkedin_url'        => $data['linkedin_url'] ?? '',
            'whatsapp_number'     => $data['whatsapp_number'] ?? '',
            'show_calculator'     => $data['show_calculator'] ?? true,
            // 'show_gallery'        => $data['show_gallery'] ?? true,
            // 'show_why_choose_us'  => $data['show_why_choose_us'] ?? true,
            // 'show_services'       => $data['show_services'] ?? true,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return SiteSettingsForm::configure($schema);
    }

    public function save(): void
    {
        // Extract og_image string path from array
        $ogImagePath = is_array($this->og_image) && count($this->og_image)
            ? array_values($this->og_image)[0]
            : null;

        $data = [
            'is_published'        => $this->is_published,
            'site_name'           => $this->site_name,
            'meta_title'          => $this->meta_title,
            'meta_description'    => $this->meta_description,
            'meta_keywords'       => $this->meta_keywords,
            'og_image'            => $ogImagePath,
            'phone'               => $this->phone,
            'email'               => $this->email,
            'address'             => $this->address,
            'google_analytics_id' => $this->google_analytics_id,
            'gtm_id'              => $this->gtm_id,
            'header_scripts'      => $this->header_scripts,
            'footer_scripts'      => $this->footer_scripts,
            'facebook_url'        => $this->facebook_url,
            'instagram_url'       => $this->instagram_url,
            'linkedin_url'        => $this->linkedin_url,
            'whatsapp_number'     => $this->whatsapp_number,
            'show_calculator'     => $this->show_calculator,
            // 'show_gallery'        => $this->show_gallery,
            // 'show_why_choose_us'  => $this->show_why_choose_us,
            // 'show_services'       => $this->show_services,
        ];

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
