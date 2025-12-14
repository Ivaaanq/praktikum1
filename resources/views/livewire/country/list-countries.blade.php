<div class="container m-auto">
    <livewire:country.store-countries />
    <h2>List Countries</h2>
    <div>
        <input type="text" placeholder="Search..." wire:model.live.debounce.400ms="search" wire:keyup="updateSearch">
    </div>
     <div class="overflow-x-auto">
        <table class="w-full border-collapse">
        <thead>
            <tr class="grid grid-cols-[1fr_3fr_1fr_1fr_1fr] bg-blue-400 text-white items-center">
                @foreach ($orderByFields as $item)
                <th  class="py-2 cursor pointer" wire:click="searching({{$item}})">{{$item}} <x-arrow :field="$item":orderByField="$orderByField":orderByDirection/></th>
                @endforeach
                <th>Edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr wire:key="{{ $country->id }}" class="grid grid-cols-[1fr_3fr_1fr_1fr_1fr] text-center hover:text-white hover:bg-blue-400 items-center even:bg-gray-300">
                    <td class="py-2">{{ $country->id}}</td>

                    <td class="py-2" x-data="{edit: false}">

                        <div x-show="edit">
                            <input type="text" value="{{$country->name}}" class="border" x-ref="id_{{$country->id}}">
                            <button x-on:click="edit = false" wire:click="saveName($refs.id_{{$country->id}}.value, {{$country->id}})">Save</button>
                        </div>

                     <span x-show="!edit" x-on:dblclick="edit = true">{{ $country->name }}</span>
                     <button x-show="!edit" x-on:click="edit = true">Edit Name</button>

                    </td>
                    <td class="py-2">
                        <button wire:click="decrement({{ $country->id }})" class="cursor-pointer">-</button>
                        <span>{{ $country->top}}</span>
                        <button wire:click="increment({{ $country->id }})" class="cursor-pointer">+</button>
                    </td>
                    <td>
                        <button wire:click="editCountry({{ $country->id }})" class="bg-green-500 text-white hover:bg-red-500 cursor-pointer">Edit</button>
                    </td>
                    <td class="py-2">
                        <button wire:click="deleteCountry({{ $country->id }})" class="bg-red-500 text-white hover:bg-green-500 cursor-pointer">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="">
        {{ $countries->links() }}
    </div>
</div>