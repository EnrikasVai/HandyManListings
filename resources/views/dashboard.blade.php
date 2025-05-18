<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-bold mb-4">Your Listings:</h2>

                    @if($listings->isEmpty())
                        <p class="text-gray-600 mb-4">You don't have any listings yet.</p>
                        <a href="{{ route('listings.create') }}">
                            <x-primary-button>Add a Listing</x-primary-button>
                        </a>
                    @else
                        <ul class="space-y-4">
                            @foreach($listings as $listing)
                                <li class="border rounded p-4">
                                    <h3 class="font-semibold text-lg">{{ $listing->title }}</h3>
                                    <p class="text-sm text-gray-600">{{ $listing->location }}</p>
                                    <a href="{{ route('listings.show', $listing) }}" class="text-blue-500 text-sm underline">View</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{-- route('listings.create')--}}">
                            <x-primary-button>Add a Listing</x-primary-button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

