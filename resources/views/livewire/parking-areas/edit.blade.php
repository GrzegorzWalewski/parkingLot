<div>
    <form class="h-auto max-w-lg mx-auto" wire:submit="save">
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="hidden" wire:model="form.id">

        <label for="name">Name</label>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="text" wire:model="form.name" placeholder="Name">
        @error('form.name')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror

        <label for="name">Weekday price</label>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="number" wire:model="form.weekday_price" placeholder="Weekday price">
        @error('form.weekday_price')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror

        <label for="name">Weekend price</label>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="number" wire:model="form.weekend_price" placeholder="Weekend price">
        @error('form.weekend_price')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror

        <label for="name">Discount</label>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="number" wire:model="form.discount" placeholder="Discount">
        @error('form.discount')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror

        <div class="grid grid-cols-2">
            <div>
                <div class="text-left text-green-600 dark:text-green-500" wire:loading>Saving...</div>
            </div>

            <div class="flex justify-end">
                <button
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
