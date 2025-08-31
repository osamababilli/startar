<div>

    <!-- Start coding here -->
    <div class="bg-white dark:bg-zinc-800  relative  overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-zinc-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input wire:model.live="search" type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-zinc-500 focus:border-zinc-500 block w-full pl-10 p-2 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-zinc-500 dark:focus:border-zinc-500"
                            placeholder="Search" required="">
                    </div>
                </form>
            </div>
            <div
                class="w-full md:w-auto flex pointer-normal flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a type="button" href="{{ route('roles.create') }}"
                    class="flex items-center justify-center dark:bg-white dark:text-white pointer dark:hover:text-zinc-200 dark:hover:bg-zinc-300 hover:bg-zinc-300 text-white bg-zinc-700  focus:ring-4 focus:ring-zinc-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-zinc-600 dark:hover:bg-zinc-700 focus:outline-none dark:focus:ring-zinc-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    {{ __('Create Role') }}
                </a>

            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-zinc-400 dark:border-gray-700 rounded-md">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-700  dark:text-zinc-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">{{ __('Role Name') }}</th>
                        <th scope="col" class="px-4 py-3">{{ __('Guard Name') }}</th>
                        <th scope="col" class="px-4 py-3 text-center">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $role->name }}</th>

                            <td class="px-4 py-3">{{ $role->guard_name }}</td>
                            <td class="px-4 py-3 flex items-center justify-center">
                                <button id="{{ $role->name }}-dropdown-button"
                                    data-dropdown-toggle="{{ $role->name }}-dropdown"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-zinc-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $role->name }}-dropdown"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-zinc-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="{{ $role->name }}-dropdown-button">

                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">{{ __('Edit') }}</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:text-gray-200 dark:hover:text-white">{{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="px-4 py-12 text-center ">
                                <div class="flex flex-row items-center justify-center gap-2">
                                    <span>
                                        <svg class="w-8 h-8 text-gray-400" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </span>
                                    <div>
                                        {{ __('No data found') }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $roles->links() }}
        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
            aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-zinc-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">1000</span>
            </span>
            <ul class="inline-flex items-stretch -space-x-px">
                <li>
                    <a href="#"
                        class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-zinc-800 dark:border-gray-700 dark:text-zinc-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-zinc-800 dark:border-gray-700 dark:text-zinc-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-zinc-800 dark:border-gray-700 dark:text-zinc-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-zinc-600 bg-zinc-50 border border-zinc-300 hover:bg-zinc-100 hover:text-zinc-700 dark:border-gray-700 dark:bg-zinc-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-zinc-800 dark:border-gray-700 dark:text-zinc-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-zinc-800 dark:border-gray-700 dark:text-zinc-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-zinc-800 dark:border-gray-700 dark:text-zinc-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
