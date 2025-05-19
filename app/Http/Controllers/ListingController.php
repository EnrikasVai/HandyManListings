<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::with('category', 'user')->latest()->get();
        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ListingCategory::all();
        return view('listings.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'listing_category_id' => 'required|exists:listing_categories,id',
        ]);

        $listing = Listing::create([
            ...$validated,
            'user_id' => Auth::id(),
            'is_active' => true,
        ]);

        return redirect()->route('listings.show', $listing)->with('success', 'Listing created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        //
        $listing->load(['category', 'images']); // eager load relationships
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        $this->authorize('update', $listing);
        $categories = ListingCategory::all();
        return view('listings.edit', compact('listing', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id !== auth()->id()) {
            abort(403); // Prevent if not owner
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'location' => 'required|string|max:255',
            'listing_category_id' => 'required|exists:listing_categories,id',
        ]);

        $listing->update($validated);

        return redirect()->route('listings.show', $listing)->with('success', 'Listing updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $this->authorize('delete', $listing);
        if ($listing->user_id !== auth()->id()) {
            abort(403); // Prevent if not owner
        }
        $listing->delete();
        return redirect()->route('dashboard')->with('success', 'Listing deleted!');
    }
}
