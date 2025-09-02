<div>


    <flux:heading size="lg" class="text-zinc-900 dark:text-zinc-300 mb-4">{{ __('Edit Role') }}
    </flux:heading>

    <div class="max-w-2xl">
        <form method="POST" wire:submit="updateRole" class="flex flex-col gap-6">
            <!-- Role Name -->
            <flux:input wire:model.blur="roleName" :label="__('Role Name')" type="text" required
                placeholder="{{ __('Role Name') }}" />

            <flux:select disabled wire:model="guardName" placeholder="{{ __('Select Guard Name') }}">


                @foreach (array_keys(config('auth.guards')) as $guard)
                    <flux:select.option>{{ $guard }}</flux:select.option>
                @endforeach

            </flux:select>

            <flux:label for="permissions" :value="__('Permissions')" class="mb-2" />

            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-h-60 overflow-y-auto border border-zinc-200 dark:border-zinc-700 rounded-lg  p-4">

                @forelse ($pemissions as $permission)
                    <div class="flex items-center">
                        <flux:checkbox wire:model="selectedPermissions" value="{{ $permission->name }}"
                            id="permission-{{ $permission->id }}" />
                        <flux:label for="permission-{{ $permission->id }}" class="ml-2">{{ $permission->name }}
                        </flux:label>
                    </div>
                @empty
                    <div
                        class="flex flex-row items-center justify-center col-span-3 text-center text-gray-500 space-x-2">
                        <span>
                            <svg class="w-8 h-8 text-gray-400" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </span>
                        <div>
                            {{ __('No permissions available for the selected guard') }}
                        </div>
                    </div>
                @endforelse

            </div>


            <div class="flex items-center justify-end mt-4">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Update') }}</flux:button>
            </div>
        </form>

    </div>
</div>
