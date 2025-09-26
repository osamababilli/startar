<div>
    <flux:modal name="languageEditModal" class="w-full md:w-1/2" :dismissible="false">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Add New Language') }}</flux:heading>

            </div>
            <flux:input wire:model.live="name" label="{{ __('Name') }}" placeholder="{{ __('Language Name') }}" />

            <flux:input wire:model.live="code" label="{{ __('Code') }}"
                placeholder="{{ __('Language Code (e.g., en, fr, ar)') }}" />

            <flux:select wire:model.live="direction" label="{{ __('Direction') }}">
                <option value="ltr">{{ __('Left to Right (LTR)') }}</option>
                <option value="rtl">{{ __('Right to Left (RTL)') }}</option>
            </flux:select>


            <flux:checkbox wire:model.live="is_active" label="{{ __('Active') }}" />
            <flux:checkbox wire:model.live="is_default" label="{{ __('Default') }}" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" wire:loading.attr="disabled" wire:target="updateLanguage"
                    wire:click="updateLanguage" variant="primary">{{ __('Save') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
