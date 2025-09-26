<?php

namespace App\Services;

use App\Models\Translation;
use Illuminate\Support\Facades\File;

class TranslationService
{
    public function exportToJson($locale)
    {
        $translations = Translation::where('locale', $locale)
            ->pluck('value', 'key')
            ->toArray();

        $path = resource_path("lang/{$locale}.json");

        File::put($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function exportAll()
    {
        $locales = Translation::select('locale')->distinct()->pluck('locale');
        foreach ($locales as $locale) {
            $this->exportToJson($locale);
        }
    }
}
