<div x-data="multiSelect(@js($options), '{{ $optionLabel }}', '{{ $optionValue }}')" class="w-full">
    <flux:label class="block text-sm mb-1 font-medium text-zinc-900 dark:text-white">
        {{ $label }}</flux:label>
    <div class="relative mt-1">
        <button type="button" @click="open = !open"
            class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <span class="block truncate"
                x-text="selectedOptions.length ? selectedOptions.map(o=>o[labelKey]).join(', ') : 'Select options'"></span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 3l3 3-1.4 1.4L10 5.4 8.4 7.4 7 6l3-3zm-3.7 9.3l1.4 1.4L10 14.6l2.3-2.3 1.4 1.4-3 3-3-3z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <div x-show="open" @click.away="open = false"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto sm:text-sm"
            style="display: none;">
            <template x-for="option in options" :key="option[valueKey]">
                <div @click="toggleOption(option)"
                    class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-indigo-600 hover:text-white">
                    <span x-text="option[labelKey]"
                        :class="{ 'font-semibold': selectedOptionsIds.includes(option[valueKey]) }"
                        class="block truncate"></span>
                    <span x-show="selectedOptionsIds.includes(option[valueKey])"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600 hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.7 5.3a1 1 0 010 1.4l-8 8a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4L8 12.6l7.3-7.3a1 1 0 011.4 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </template>
        </div>
    </div>
    <!-- لربط Livewire -->
    <input type="hidden" name="{{ $attributes->wire('model')->value() }}" :value="JSON.stringify(selectedOptionsIds)">
</div>

<script>
    function multiSelect(options, labelKey, valueKey) {
        return {
            open: false,
            options: options,
            labelKey: labelKey,
            valueKey: valueKey,
            selectedOptions: [],
            get selectedOptionsIds() {
                return this.selectedOptions.map(o => o[this.valueKey]);
            },
            toggleOption(option) {
                const exists = this.selectedOptions.find(o => o[this.valueKey] === option[this.valueKey]);
                if (exists) {
                    this.selectedOptions = this.selectedOptions.filter(o => o[this.valueKey] !== option[this.valueKey]);
                } else {
                    this.selectedOptions.push(option);
                }
            }
        }
    }
</script>
