<div>
    <form wire:submit="calculate">
        <label for="parkingAreaId">Parking Area</label>
        <select id="parkingAreaId" wire:model="parkingAreaId">
            <option value="">Select Parking Area</option>
            @foreach($parkingAreas as $parkingArea)
                <option value="{{ $parkingArea->id }}">{{ $parkingArea->name }}</option>
            @endforeach
        </select>
        <div>@error('parkingAreaId') {{ $message }} @enderror</div>

        <label for="startDate">Start Date</label>
        <input type="text" wire:model="startDate" id="startDate" name="startDate" data-picker>
        <div>@error('startDate') {{ $message }} @enderror</div>

        <label for="endDate">End Date</label>
        <input type="text" wire:model="endDate" id="endDate" name="endDate" data-picker>
        <div>@error('endDate') {{ $message }} @enderror</div>

        <label for="currency">Currency</label>
        <select id="currency" wire:model="currency">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="PLN">PLN</option>
        </select>
        <div>@error('currency') {{ $message }} @enderror</div>

        <button type="submit">Calculate</button>
        <div wire:loading>Calculating...</div>
    </form>

    @if($result)
        <h2>Result</h2>
        <p>Total: {{ $result['total'] }}</p>
        <p>After Discount: {{ $result['discounted'] }}</p>
        @if ($result['showNotice'])
            <p>Final price may differ because the end date is in the future and we can't check exchange rates for future dates</p>
        @endif
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
        onClose: function (selectedDates, dateStr, instance) {
            $wire.set('startDate', dateStr);
        }
    });

    flatpickr("#endDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:00",
        minuteIncrement: 60,
        time_24hr: true,
        onClose: function (selectedDates, dateStr, instance) {
            $wire.set('endDate', dateStr);
        }
    });
</script>
@endscript