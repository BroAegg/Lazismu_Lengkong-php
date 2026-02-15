<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalDonasi = Donation::where('donor_id', $user->id)->verified()->sum('amount');
        $jumlahDonasi = Donation::where('donor_id', $user->id)->verified()->count();
        $donasiPending = Donation::where('donor_id', $user->id)->pending()->count();

        $recentDonations = Donation::with(['category', 'program'])
            ->where('donor_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', compact('totalDonasi', 'jumlahDonasi', 'donasiPending', 'recentDonations'));
    }
}
