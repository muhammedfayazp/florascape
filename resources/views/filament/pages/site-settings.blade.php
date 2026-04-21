<x-filament-panels::page>
    {{-- Header notice --}}
    <div class="rounded-lg border border-primary-200 bg-primary-50 p-4 mb-6 dark:border-primary-800 dark:bg-primary-950">
        <div class="flex items-start gap-3">
            <div class="flex-shrink-0 mt-0.5">
                <x-heroicon-o-information-circle class="h-5 w-5 text-primary-600 dark:text-primary-400" />
            </div>
            <div>
                <p class="text-sm font-medium text-primary-800 dark:text-primary-200">How to use these settings</p>
                <p class="text-sm text-primary-700 dark:text-primary-300 mt-1">
                    Navigate the tabs above to update different sections. Click <strong>Save Settings</strong> (top right) when done. Changes take effect immediately.
                </p>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="save">
        {{ $this->form }}

        {{-- Bottom Save Bar --}}
        <div class="sticky bottom-0 z-10 mt-8 -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 py-4
                    bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700
                    shadow-[0_-4px_20px_rgba(0,0,0,0.08)]">
            <div class="flex items-center justify-between max-w-7xl mx-auto">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Remember:</span>
                    Unsaved changes will be lost if you navigate away.
                </p>
                <x-filament::button
                    type="submit"
                    size="lg"
                    color="success"
                    icon="heroicon-o-check-circle"
                >
                    Save Settings
                </x-filament::button>
            </div>
        </div>
    </form>
</x-filament-panels::page>
