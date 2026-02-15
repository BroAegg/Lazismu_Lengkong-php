<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Distribution;
use App\Enums\PsakFundType;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));

        // Penghimpunan per fund type
        $penghimpunan = Donation::verified()
            ->whereBetween('created_at', [$startDate, $endDate . ' 23:59:59'])
            ->selectRaw('psak_fund_type, SUM(amount) as total, SUM(amil_amount) as amil, SUM(net_amount) as net, COUNT(*) as count')
            ->groupBy('psak_fund_type')
            ->get();

        // Penyaluran per asnaf
        $penyaluran = Distribution::whereBetween('distributed_at', [$startDate, $endDate . ' 23:59:59'])
            ->selectRaw('asnaf_category, SUM(amount) as total, COUNT(*) as count')
            ->groupBy('asnaf_category')
            ->get();

        return view('admin.reports.index', compact('penghimpunan', 'penyaluran', 'startDate', 'endDate'));
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));

        $penghimpunan = Donation::verified()
            ->whereBetween('created_at', [$startDate, $endDate . ' 23:59:59'])
            ->selectRaw('psak_fund_type, SUM(amount) as total, SUM(amil_amount) as amil, SUM(net_amount) as net')
            ->groupBy('psak_fund_type')
            ->get();

        $penyaluran = Distribution::whereBetween('distributed_at', [$startDate, $endDate . ' 23:59:59'])
            ->selectRaw('asnaf_category, SUM(amount) as total')
            ->groupBy('asnaf_category')
            ->get();

        $pdf = Pdf::loadView('admin.reports.pdf', compact('penghimpunan', 'penyaluran', 'startDate', 'endDate'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download("laporan-lazismu-{$startDate}-{$endDate}.pdf");
    }
}
