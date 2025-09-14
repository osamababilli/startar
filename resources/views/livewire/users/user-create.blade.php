<div>
    <div>
        <flux:heading size="lg" class="text-zinc-900 dark:text-zinc-300 mb-4">{{ __('Create New User') }}
        </flux:heading>
    </div>
    <form wire:submit.prevent="createUser" class="space-y-6">

        <div class="grid grid-cols-3 gap-6 ">

            <flux:input wire:model.blur="Name" :label="__('Name')" type="text" placeholder="{{ __('Name') }}" />

            <flux:input wire:model.blur="Email" :label="__('Email')" type="text" placeholder="{{ __('Email') }}" />


            <div>


                <flux:select multiple wire:model.live="guardName" :label="__('Guard Name')"
                    placeholder="{{ __('Select Guard Name') }}">


                    @foreach (array_keys(config('auth.guards')) as $guard)
                        <flux:select.option>{{ $guard }}</flux:select.option>
                    @endforeach

                </flux:select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <flux:button type="submit" class="ml-4">
                    {{ __('Create User') }}
                </flux:button>
            </div>
        </div>
    </form>

</div>
