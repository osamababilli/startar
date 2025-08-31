<div>


    <flux:heading size="lg" class="text-zinc-900 dark:text-zinc-300 mb-4">{{ __('Edit Role') }}
    </flux:heading>

    <div class="max-w-2xl">
        <form method="POST" wire:submit="updateRole" class="flex flex-col gap-6">
            <!-- Role Name -->
            <flux:input wire:model.blur="roleName" :label="__('Role Name')" type="text" required
                placeholder="{{ __('Role Name') }}" />

            <flux:select wire:model="guardName" placeholder="{{ __('Select Guard Name') }}">


                @foreach (array_keys(config('auth.guards')) as $guard)
                    <flux:select.option>{{ $guard }}</flux:select.option>
                @endforeach

            </flux:select>

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Update Role') }}</flux:button>
            </div>
        </form>

    </div>
</div>
