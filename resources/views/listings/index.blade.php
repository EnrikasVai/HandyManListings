<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Handyman Listings
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @foreach ($listings as $listing)
                <div class="bg-white mb-4 p-4 border rounded shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-bold">{{ $listing->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $listing->location }}</p>
                    <p class="mt-2">{{ Str::limit($listing->description, 100) }}</p>
                    <a href="{{ route('listings.show', $listing) }}">
                        <x-secondary-button class="mt-2">
                            View more
                        </x-secondary-button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
