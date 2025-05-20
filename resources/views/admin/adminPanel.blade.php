<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin panel') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">

        {{-- Admin Welcome --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>Welcome to the admin panel</p>
            </div>
        </div>

        {{-- User List --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Users</h3>
                <table class="w-full table-auto border-collapse">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->id }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Listings List --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Listings</h3>
                <table class="w-full table-auto border-collapse">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Owner</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listings as $listing)
                        <tr>
                            <td class="border px-4 py-2">{{ $listing->id }}</td>
                            <td class="border px-4 py-2">{{ $listing->title }}</td>
                            <td class="border px-4 py-2">{{ $listing->user->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.listings.destroy', $listing) }}" method="POST" onsubmit="return confirm('Delete this listing?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>

