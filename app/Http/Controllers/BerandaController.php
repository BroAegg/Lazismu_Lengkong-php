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
            'total_donasi' => Donation::where('status', 'VERIFIED')->sum('amount'),
            'total_donatur' => Donation::where('status', 'VERIFIED')
                ->selectRaw('COUNT(DISTINCT COALESCE(donor_id, donor_email)) as count')
                ->value('count'),
            'total_program' => Program::where('is_active', true)->count(),
            'total_tersalurkan' => Donation::where('status', 'VERIFIED')->sum('net_amount'),
        ];

        $featuredPrograms = Program::with('pillar')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $categories = DonationCategory::where('is_active', true)->orderBy('order')->get();

        $recentDonations = Donation::where('status', 'VERIFIED')
            ->latest()
            ->take(10)
            ->get();

        return view('pages.beranda', compact('stats', 'featuredPrograms', 'categories', 'recentDonations'));
    }
}
