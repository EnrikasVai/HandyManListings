<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $listing->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-600 mb-2"><strong>Category:</strong> {{ $listing->category->name }}</p>
                <p class="text-gray-600 mb-2"><strong>Location:</strong> {{ $listing->location }}</p>
                <p class="text-gray-600 mb-2"><strong>Price:</strong> ${{ number_format($listing->price, 2) }}</p>
                <p class="text-gray-800 mt-4">{{ $listing->description }}</p>

                @if ($listing->images->isNotEmpty())
                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($listing->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Listing Image" class="rounded w-full">
                        @endforeach
                    </div>
                @endif

                <div class="mt-6">
                    <a href="{{ route('listings.index') }}">
                        <x-secondary-button>Back to Listings</x-secondary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
