<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Handyman Listings
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($listings as $listing)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border">
                        {{-- Display first image if available --}}
                        @if ($listing->images->isNotEmpty())
                            <div class="aspect-w-1 aspect-h-1">
                                <img src="{{ asset('storage/' . $listing->images->first()->path) }}"
                                     alt="{{ $listing->title }}"
                                     class="object-cover w-full h-full">
                            </div>
                        @else
                            <div class="aspect-w-1 aspect-h-1 bg-gray-100 flex items-center justify-center text-gray-500 text-sm">
                                No image available
                            </div>
                        @endif

                        {{-- Content section --}}
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900">{{ $listing->title }}</h3>
                            <p class="text-gray-600 text-sm mt-1">{{ Str::limit($listing->description, 80) }}</p>
                            <p class="text-gray-800 font-semibold mt-2">Price: ${{ $listing->price }}</p>

                            <a href="{{ route('listings.show', $listing) }}">
                                <x-secondary-button class="mt-4">View more</x-secondary-button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
