<?php
namespace App\Http\Controllers;

use App\Models\UserMembership;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserMembershipController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'membership_type' => 'required|in:daily,monthly',
            'duration' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $price = $request->membership_type === 'daily' ? 20000 : 150000;
        $totalPrice = $request->duration * $price;
        $startDate = now();
        $endDate = $request->membership_type === 'daily' ? Carbon::now()->addDays($request->duration) : Carbon::now()->addMonths($request->duration);

        $membership = UserMembership::create([
            'user_id' => $user->id,
            'membership_type' => $request->membership_type,
            'duration' => $request->duration,
            'total_price' => $totalPrice,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'approved' => false,
        ]);

        Invoice::create([
            'user_id' => $user->id,
            'membership_id' => $membership->id,
            'amount' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Membership request submitted, waiting for admin approval.');
    }
}
