<div>
    <h1>Edit parking area</h1>
    <form wire:submit="save">
        <input type="hidden" wire:model="form.id">

        <label for="name">Name</label>
        <input type="text" wire:model="form.name" placeholder="Name">
        <div>@error('form.name') {{ $message }} @enderror</div>

        <label for="name">Weekday price</label>
        <input type="number" wire:model="form.weekday_price" placeholder="Weekday price">
        <div>@error('form.weekday_price') {{ $message }} @enderror</div>

        <label for="name">Weekend price</label>
        <input type="number" wire:model="form.weekend_price" placeholder="Weekend price">
        <div>@error('form.weekend_price') {{ $message }} @enderror</div>

        <label for="name">Discount</label>
        <input type="number" wire:model="form.discount" placeholder="Discount">
        <div>@error('form.discount') {{ $message }} @enderror</div>

        <button type="submit">Save</button>
        <div wire:loading>Save...</div>
    </form>
</div>
