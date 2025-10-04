<?php

use Livewire\Volt\Component;

new class extends Component {
    public $languages, $language, $dufault;

    public function mount()
    {
        $this->languages = App\Models\Language::where('is_active', 1)->get();
        $this->dufault = App\Models\Language::where('is_default', 1)->first();
        // $dufault = $this->language = session()->get('locale') ?? $dufault->code;
    }
    public function setLanguage($languageCode)
    {
        session(['locale' => $this->language]);
        app()->setLocale($this->language); // لتطبيق اللغة فورًا
        return redirect()->route('settings.languages');
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    {{-- @dd($language); --}}
    <x-settings.layout :heading="__('Languages')" :subheading="__('Update the appearance settings for your account')">
        <form wire:submit.prevent="setLanguage($event.target.value)">

            <flux:radio.group>
                @foreach ($languages as $language)
                    <flux:radio value="{{ $language->code }}" label="{{ $language->name }}"
                        :checked="$language->code == $dufault->code" />
                @endforeach


            </flux:radio.group>
            <flux:button type="submit" class="cursor-pointer mt-4" size="sm" variant="primary">
                {{ __('Save') }}
            </flux:button>
        </form>
    </x-settings.layout>
</section>
