<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Listing') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded p-6">
                <form method="POST" action="{{ route('listings.update', $listing) }}">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $listing->title) }}" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea name="description" id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required> {{ old('description', $listing->description) }}  </textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" value="{{ old('price', $listing->price) }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" required value="{{ old('location', $listing->location) }}" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <x-input-label for="listing_category_id" :value="__('Category')" />
                        <select id="listing_category_id" name="listing_category_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('listing_category_id', $listing->listing_category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('listing_category_id')" class="mt-2" />
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <x-primary-button>{{ __('Update Listing') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
