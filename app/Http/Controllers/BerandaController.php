<?php

namespace App\Http\Controllers;

use App\Models\DonationCategory;
use App\Models\Program;
use App\Models\Donation;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $stats = [
            'total_donasi' => Donation::verified()->sum('amount'),
            'total_donatur' => Donation::verified()->distinct('donor_id')->count(),
            'total_program' => Program::active()->count(),
            'total_mustahik' => \App\Models\Mustahik::count(),
        ];

        $featuredPrograms = Program::with('pillar')
            ->active()
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        $categories = DonationCategory::active()->ordered()->get();

        $recentDonations = Donation::verified()
            ->latest()
            ->take(10)
            ->get();

        return view('pages.beranda', compact('stats', 'featuredPrograms', 'categories', 'recentDonations'));
    }
}
