<div>
    <table>
        <thead>
            <tr>
                @foreach($parkingAreas->first()->getAttributes() as $key => $value)
                    <th>{{ $key }}</th>
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parkingAreas as $parkingArea)
                <tr wire:key="{{ $parkingArea->id }}">
                    @foreach($parkingArea->getAttributes() as $key => $value)
                        <td>{{ $value }}</td>
                    @endforeach
                    <td>
                        <button wire:click="delete({{ $parkingArea->id }})" wire:confirm="Are you sure you want to delete this parking area?">Delete</button>
                        <a href="{{ route('edit', ['id' => $parkingArea->id]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <form wire:submit="save">
                    @foreach($parkingAreas->first()->getAttributes() as $key => $value)
                    @if($loop->first)
                        <td>
                            New record
                        </td>
                    @elseif($key === 'created_at' || $key === 'updated_at')
                        <td>
                            -
                        </td>
                    @else
                        <td>
                            <input type="text" wire:model="form.{{ $key }}" placeholder="{{ $key }}">
                            <div>@error('form.' . $key) {{ $message }} @enderror</div>
                        </td>
                    @endif
                    @endforeach
                    <td>
                        <button type="submit">Save</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
</div>