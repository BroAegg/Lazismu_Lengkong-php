<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // User's donation statistics
        $totalDonated = Donation::where('donor_id', $user->id)
            ->where('status', 'VERIFIED')
            ->sum('amount');

        $totalDonations = Donation::where('donor_id', $user->id)->count();

        $programsSupported = Donation::where('donor_id', $user->id)
            ->whereNotNull('program_id')
            ->distinct('program_id')
            ->count('program_id');

        // Recent donations
        $recentDonations = Donation::with(['category', 'program'])
            ->where('donor_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Active programs user is supporting
        $supportedPrograms = Program::whereHas('donations', function ($query) use ($user) {
                $query->where('donor_id', $user->id)->where('status', 'VERIFIED');
            })
            ->with(['pillar', 'donations' => function ($query) use ($user) {
                $query->where('donor_id', $user->id)->where('status', 'VERIFIED');
            }])
            ->take(6)
            ->get();

        return view('dashboard', compact(
            'totalDonated',
            'totalDonations',
            'programsSupported',
            'recentDonations',
            'supportedPrograms'
        ));
    }
}
