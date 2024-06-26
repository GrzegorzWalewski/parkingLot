<div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($columns as $column)
                    <th scope="col" class="px-6 py-3">{{ $column }}</th>
                @endforeach
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parkingAreas as $parkingArea)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    wire:key="{{ $parkingArea->id }}">
                    @foreach ($parkingArea->getAttributes() as $key => $value)
                        @if ($key === 'created_at' || $key === 'updated_at')
                            @continue
                        @endif
                        <td class="px-6 py-4">{{ $value }}</td>
                    @endforeach
                    <td class="px-6 py-4 text-right inline-flex rounded-md shadow-sm">
                        <a href="#" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            wire:click="delete({{ $parkingArea->id }})"
                            wire:confirm="Are you sure you want to delete this parking area?">Delete</button>
                        <a class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            href="{{ route('edit', ['id' => $parkingArea->id]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <form wire:submit="save">
                    @foreach ($columns as $column)
                        @if ($loop->first)
                            <td class="px-6 py-4">
                                New record
                            </td>
                        @else
                            <td class="px-6 py-4">
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" wire:model="form.{{ $column }}"
                                    placeholder="{{ $column }}">
                                @error('form.' . $column)
                                    <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </td>
                        @endif
                    @endforeach
                    <td class="px-6 py-4 text-right">
                        <button class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 w-full"
                            type="submit">Save</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <div class="mx-auto w-1/5 my-5">
        {{ $parkingAreas->links() }}
    </div>
</div>
