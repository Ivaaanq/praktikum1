<div class="container m-auto">
    <h2 class="text-2xl font-bold mb-4">List Users</h2>

    <div class="mb-4">
        <input type="text"
               placeholder="Search"
               wire:model.live.debounce.400ms="search"
               class="border px-4 py-2 rounded w-full">
    </div>


    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="py-3 px-4">Id</th>
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b hover:bg-green-50 text-center">
                    <td class="py-3 px-4">{{ $user->id }}</td>
                    <td class="py-3 px-4">{{ $user->name }}</td>
                    <td class="py-3 px-4">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
