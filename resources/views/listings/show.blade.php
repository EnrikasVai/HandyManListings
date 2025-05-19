<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $listing->title }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-md">

                {{-- Meta Info --}}
                <div class="space-y-2 text-gray-700">
                    <p><span class="font-semibold text-gray-900">Category:</span> {{ $listing->category->name }}</p>
                    <p><span class="font-semibold text-gray-900">Location:</span> {{ $listing->location }}</p>
                    <p><span class="font-semibold text-gray-900">Price:</span> ${{ number_format($listing->price, 2) }}</p>
                </div>

                {{-- Description --}}
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                    <p class="text-gray-800 leading-relaxed">{{ $listing->description }}</p>
                </div>

                {{-- Images --}}
                @if ($listing->images->isNotEmpty())
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Gallery</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($listing->images as $image)
                                <div class="overflow-hidden rounded-lg shadow-sm">
                                    <img src="{{ asset('storage/' . $image->path) }}"
                                         alt="Listing Image"
                                         class="object-cover w-full h-48 hover:scale-105 transition-transform duration-300">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Back button --}}
                <div class="mt-10">
                    <a href="{{ route('listings.index') }}">
                        <x-secondary-button>← Back to Listings</x-secondary-button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
