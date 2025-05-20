<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        $listings = \App\Models\Listing::with('user')->get();

        return view('admin.adminPanel', compact('users', 'listings'));
    }
    public function destroyUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted.');
    }

    public function destroyListing(Listing $listing)
    {
        $listing->delete();
        return back()->with('success', 'Listing deleted.');
    }


}
