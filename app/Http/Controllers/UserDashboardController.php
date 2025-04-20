<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMembership; // Assuming this model exists

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch memberships related to the logged-in user
        $memberships = UserMembership::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $jadwalPelatih = $user->pelatih?->jadwalPelatih ?? collect();

        return view('dashboard', compact('user', 'memberships', 'jadwalPelatih'));
    }
}
