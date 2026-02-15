<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Enums\DonationStatus;
use Illuminate\Http\Request;

class AdminDonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with(['donor', 'category', 'subCategory', 'program']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('invoice_number', 'like', '%' . $request->search . '%')
                  ->orWhere('donor_name', 'like', '%' . $request->search . '%');
            });
        }

        $donations = $query->latest()->paginate(15);

        return view('admin.donations.index', compact('donations'));
    }

    public function show(int $id)
    {
        $donation = Donation::with(['donor', 'category', 'subCategory', 'program', 'verifier'])->findOrFail($id);
        return view('admin.donations.show', compact('donation'));
    }

    public function verify(Request $request, int $id)
    {
        $request->validate([
            'status' => 'required|in:verified,failed',
            'notes' => 'nullable|string|max:500',
        ]);

        $donation = Donation::findOrFail($id);
        $donation->update([
            'status' => $request->status === 'verified' ? DonationStatus::VERIFIED : DonationStatus::FAILED,
            'verified_by' => auth()->id(),
            'verified_at' => now(),
            'notes' => $request->notes,
        ]);

        // Update program collected_amount if verified
        if ($request->status === 'verified' && $donation->program_id) {
            $donation->program->increment('collected_amount', $donation->net_amount);
            $donation->program->increment('donor_count');
        }

        $statusLabel = $request->status === 'verified' ? 'diverifikasi' : 'ditolak';
        return back()->with('success', "Donasi berhasil {$statusLabel}.");
    }
}
