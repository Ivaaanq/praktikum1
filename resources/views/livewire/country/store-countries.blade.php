<div>
    @if ($isEdit)
        <h2>Edit Country</h2>

        <div>
            <input type="text" wire:model="name" placeholder="add country">
            @error('name')
                <span class="text-red-400">{{$message}}</span>
            @enderror
            <input type="number" wire:model="top" placeholder="top">
            @error('top')
                <span class="text-red-400">{{$message}}</span>
            @enderror
            <button wire:click="save">Save</button>
        </div>
    @else
        <h2>Store Country</h2>

        <div>
            <input type="text" wire:model="name" placeholder="add country">
            @error('name')
                <span class="text-red-400">{{$message}}</span>
            @enderror
            <input type="number" wire:model="top" placeholder="top">
            @error('top')
                <span class="text-red-400">{{$message}}</span>
            @enderror
            <button wire:click="storeCountry">Save</button>
        </div>
    @endif
</div>