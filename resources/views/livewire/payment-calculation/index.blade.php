<div>
    <form wire:submit="calculate" class="h-auto max-w-lg mx-auto">
        <label for="parkingAreaId">Parking Area</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            id="parkingAreaId" wire:model="parkingAreaId">
            <option value="">Select Parking Area</option>
            @foreach ($parkingAreas as $parkingArea)
                <option value="{{ $parkingArea->id }}">{{ $parkingArea->name }}</option>
            @endforeach
        </select>

        @error('parkingAreaId')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror


        <label for="startDate">Start Date</label>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="text" wire:model="startDate" id="startDate" name="startDate" data-picker>

        @error('startDate')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror


        <label for="endDate">End Date</label>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            type="text" wire:model="endDate" id="endDate" name="endDate" data-picker>
        @error('endDate')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror


        <label for="currency">Currency</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3"
            id="currency" wire:model="currency">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="PLN">PLN</option>
        </select>

        @error('currency')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror

        <div class="grid grid-cols-2">
            <div>
                <div class="text-left text-green-600 dark:text-green-500" wire:loading>Calculating...</div>
            </div>

            <div class="flex justify-end">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    type="submit">Calculate</button>
            </div>
        </div>

    </form>

    @if ($result)
        <div wire:loading.remove class="h-auto max-w-lg mx-auto text-center border border-green-300 rounded-lg mt-6">
            <h2 class="text-4xl font-extrabold dark:text-white my-5">Result</h2>
            <div class="grid grid-cols-2">
                <div
                    class="max-w-sm p-6 m-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $result['total'] }}</p>
                </div>
                <div
                    class="max-w-sm p-6 m-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">After Discount</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $result['discounted'] }}</p>
                </div>
            </div>
            @if ($result['showNotice'])
                <div class="flex p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                    role="alert">
                    <div>
                        Final price may differ because the end date is in the future and we can't check exchange rates
                        for
                        future dates.
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>

@assets
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endassets

@script
    <script>
        flatpickr("#startDate", {
            enableTime: true,
            dateFormat: "Y-m-d H:00",
            minuteIncrement: 60,
            time_24hr: true,
            onClose: function(selectedDates, dateStr, instance) {
                $wire.set('startDate', dateStr);
            }
        });

        flatpickr("#endDate", {
            enableTime: true,
            dateFormat: "Y-m-d H:00",
            minuteIncrement: 60,
            time_24hr: true,
            onClose: function(selectedDates, dateStr, instance) {
                $wire.set('endDate', dateStr);
            }
        });
    </script>
@endscript
