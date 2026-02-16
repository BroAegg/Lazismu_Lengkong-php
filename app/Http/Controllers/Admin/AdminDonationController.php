<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Enums\DonationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'notes' => 'nullable|string|max:500',
        ]);

        $donation = Donation::findOrFail($id);
        
        if ($donation->status->value === 'VERIFIED') {
            return back()->with('error', 'Donasi sudah terverifikasi sebelumnya.');
        }

        $donation->update([
            'status' => DonationStatus::VERIFIED,
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'notes' => $request->notes,
        ]);

        // Update program collected_amount if verified
        if ($donation->program_id) {
            $donation->program->increment('collected_amount', $donation->net_amount);
            $donation->program->increment('donor_count');
        }

        return back()->with('success', 'Donasi berhasil diverifikasi.');
    }

    public function reject(Request $request, int $id)
    {
        $request->validate([
            'notes' => 'required|string|max:500',
        ]);

        $donation = Donation::findOrFail($id);
        
        if ($donation->status->value === 'VERIFIED') {
            return back()->with('error', 'Donasi yang sudah terverifikasi tidak dapat ditolak.');
        }

        $donation->update([
            'status' => DonationStatus::REJECTED,
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Donasi berhasil ditolak.');
    }
}
