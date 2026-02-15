<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Program;
use App\Models\Mustahik;
use App\Models\Distribution;
use App\Enums\DonationStatus;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_penghimpunan' => Donation::verified()->sum('amount'),
            'total_penyaluran' => Distribution::sum('amount'),
            'donasi_pending' => Donation::pending()->count(),
            'total_donatur' => Donation::verified()->distinct('donor_id')->count(),
            'total_mustahik' => Mustahik::count(),
            'program_aktif' => Program::active()->count(),
        ];

        $recentDonations = Donation::with(['donor', 'category'])
            ->latest()
            ->take(10)
            ->get();

        $monthlyData = Donation::verified()
            ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month')
            ->toArray();

        return view('admin.dashboard', compact('stats', 'recentDonations', 'monthlyData'));
    }
}
