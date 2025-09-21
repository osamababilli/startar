<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <flux:sidebar sticky stashable
            class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 w-64 flex flex-col">
            <div class="flex items-center justify-between px-4 py-3">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                    <x-app-logo />
                </a>
                <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
            </div>

            <flux:navlist variant="outline" class="px-2">
                <flux:navlist.group :heading="__('Platform')" class="space-y-1">
                    <flux:navlist.item icon="home" :href="route('dashboard')"
                        :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                </flux:navlist.group>

                @can('view users')
                    <flux:navlist.group :heading="__('Users Management')" class="mt-3 space-y-1">
                        <flux:navlist.group expandable :expanded="false" heading="{{ __('Users') }}">
                            <flux:navlist.item :href="route('users.index')" :current="request()->routeIs('users.index')"
                                wire:navigate>
                                {{ __('All Users') }}
                            </flux:navlist.item>
                            @can('create user')
                                <flux:navlist.item :href="route('users.create')" :current="request()->routeIs('users.create')"
                                    wire:navigate>
                                    {{ __('Create New User') }}
                                </flux:navlist.item>
                            @endcan
                        </flux:navlist.group>
                    </flux:navlist.group>
                @endcan

                @if (auth()->user()->can('view roles') || auth()->user()->can('view permissions'))
                    <flux:navlist.group :heading="__('Roles & Permissions')" class="mt-3 space-y-1">
                        <flux:navlist.group expandable :expanded="false" heading="{{ __('Roles') }}">
                            <flux:navlist.item :href="route('roles.index')"
                                :current="request()->routeIs('roles.index')" wire:navigate>
                                {{ __('All Roles') }}
                            </flux:navlist.item>
                            @can('create role')
                                <flux:navlist.item :href="route('roles.create')"
                                    :current="request()->routeIs('roles.create')" wire:navigate>
                                    {{ __('Create New Role') }}
                                </flux:navlist.item>
                            @endcan
                        </flux:navlist.group>

                        <flux:navlist.group expandable :expanded="false" heading="{{ __('Permissions') }}">
                            <flux:navlist.item :href="route('permissions.index')"
                                :current="request()->routeIs('permissions.index')" wire:navigate>
                                {{ __('All Permissions') }}
                            </flux:navlist.item>
                            @can('create permission')
                                <flux:navlist.item :href="route('permissions.create')"
                                    :current="request()->routeIs('permissions.create')" wire:navigate>
                                    {{ __('Create New Permission') }}
                                </flux:navlist.item>
                            @endcan
                        </flux:navlist.group>
                    </flux:navlist.group>
                @endif
            </flux:navlist>

            <flux:spacer />

            <!-- User dropdown (desktop) -->
            <flux:dropdown class="hidden lg:block px-4 pb-4" position="top" align="start">
                <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()" />
                <flux:menu class="w-56">
                    <flux:menu.radio.group>
                        <div class="flex items-center gap-2 px-2 py-2">
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-200 dark:bg-neutral-700">
                                {{ auth()->user()->initials() }}
                            </span>
                            <div class="flex-1 text-sm">
                                <span class="block font-semibold truncate">{{ auth()->user()->name }}</span>
                                <span class="block text-xs truncate text-zinc-500 dark:text-zinc-400">
                                    {{ auth()->user()->email }}
                                </span>
                            </div>
                        </div>
                    </flux:menu.radio.group>
                    <flux:menu.separator />
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                    <flux:menu.separator />
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Main section -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Header -->
            <flux:header
                class="sticky top-0 z-10 flex items-center justify-between border-b border-zinc-200 bg-zinc-50 px-4 py-3 dark:border-zinc-700 dark:bg-zinc-900">
                <!-- Mobile menu button -->
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                <!-- Search bar placeholder -->
                <div class="flex-1 px-4">
                    <input type="text" placeholder="{{ __('Search') }}"
                        class="w-full rounded-md bg-zinc-100 px-3 py-2 text-sm text-zinc-800 placeholder-zinc-400 focus:outline-none dark:bg-zinc-800 dark:text-zinc-100" />
                </div>

                <!-- Notifications + user -->
                <div class="flex items-center gap-4">
                    <button class="text-zinc-500 hover:text-zinc-700 dark:hover:text-zinc-300">
                        <flux:icon name="bell" />
                    </button>

                    <flux:dropdown position="bottom" align="end" class="lg:hidden">
                        <flux:profile :initials="auth()->user()->initials()" />
                        <flux:menu>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                                {{ __('Settings') }}
                            </flux:menu.item>
                            <flux:menu.separator />
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle">
                                    {{ __('Log Out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </flux:header>

            <!-- Content area -->
            <main class="flex-1 overflow-y-auto bg-zinc-50 p-6 dark:bg-zinc-800">
                <div class="mx-auto max-w-7xl">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @fluxScripts
</body>

</html>
