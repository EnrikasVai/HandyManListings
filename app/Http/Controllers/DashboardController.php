<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $listings = Listing::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('listings'));
    }
}
