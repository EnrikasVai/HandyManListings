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

                                    <div class="flex flex-wrap items-center gap-2 mt-4">
                                        <a href="{{ route('listings.show', $listing) }}">
                                            <x-secondary-button>View Listing</x-secondary-button>
                                        </a>
                                        <a href="{{ route('listings.edit', $listing) }}">
                                            <x-secondary-button>Edit Listing</x-secondary-button>
                                        </a>

                                        @auth
                                            @if(auth()->id() === $listing->user_id)
                                                <form action="{{ route('listings.destroy', $listing) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this listing?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button>Delete Listing</x-danger-button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-6 mx-auto">
                            <a href="{{ route('listings.create') }}">
                                <x-primary-button>Add a Listing</x-primary-button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

