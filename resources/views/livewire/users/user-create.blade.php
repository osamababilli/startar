<div>
    <div>
        <flux:heading size="lg" class="text-zinc-900 dark:text-zinc-300 mb-4">{{ __('Create New User') }}
        </flux:heading>
    </div>
    <form wire:submit.prevent="createUser" class="space-y-6">

        <div class="grid grid-cols-3 gap-6 ">

            <flux:input wire:model.blur="name" :label="__('Name')" type="text" placeholder="{{ __('Name') }}" />

            <flux:input wire:model.blur="email" :label="__('Email')" type="text" placeholder="{{ __('Email') }}" />

            {{-- <flux:selectmultiple wire:model.live="guardName" :label="__('Guard Name')"
                placeholder="{{ __('Select Guard Name') }}">


                @foreach (array_keys(config('auth.guards')) as $guard)
                    <option value="{{ $guard }}">{{ $guard }}</option>
                @endforeach

            </flux:selectmultiple> --}}


            <flux:selectmultiple2 wire:model.live="selectedRoles"{{-- مرر القيمة الحالية كـ prop --}} :options="$roles"
                :placeholder="__('Select User Roles')" :option-label="'name'" :option-value="'name'"
                label="{{ __('User Roles') }}" />


            <flux:selectmultiple2 wire:model="selectedRoles" :options="$roles"
                :placeholder="__('Select User Roles')" option-label="name" option-value="name"
                label="{{ __('User Roles') }}" />




            <div class="flex items-center justify-end mt-4">
                <flux:button type="submit" class="ml-4">
                    {{ __('Create User') }}
                </flux:button>
            </div>
        </div>
    </form>

</div>
