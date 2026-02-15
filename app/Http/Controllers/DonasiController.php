<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\Program;
use App\Enums\DonationStatus;
use App\Enums\PaymentMethod;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index(Request $request)
    {
        $categories = DonationCategory::with('subCategories')->active()->ordered()->get();
        $programs = Program::active()->ongoing()->get(['id', 'title', 'slug']);
        $paymentMethods = PaymentMethod::cases();

        return view('pages.donasi', compact('categories', 'programs', 'paymentMethods'));
    }

    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $categories = DonationCategory::with('subCategories')->active()->ordered()->get();
        $paymentMethods = PaymentMethod::cases();

        return view('pages.donasi', compact('program', 'categories', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:donation_categories,id',
            'sub_category_id' => 'nullable|exists:donation_sub_categories,id',
            'program_id' => 'nullable|exists:programs,id',
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string',
            'donor_name' => 'nullable|string|max:255',
            'donor_phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:500',
            'is_anonymous' => 'boolean',
        ]);

        $donation = Donation::create([
            'invoice_number' => Donation::generateInvoiceNumber(),
            'donor_id' => auth()->id(),
            'donor_name' => $request->is_anonymous ? null : ($request->donor_name ?? auth()->user()->name),
            'donor_email' => auth()->user()->email,
            'donor_phone' => $request->donor_phone ?? auth()->user()->phone,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'program_id' => $request->program_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => DonationStatus::PENDING,
            'message' => $request->message,
            'is_anonymous' => $request->boolean('is_anonymous'),
        ]);

        // Calculate amil
        $donation->amil_amount = $donation->calculateAmilAmount();
        $donation->net_amount = $donation->amount - $donation->amil_amount;
        $donation->psak_fund_type = $donation->category?->psak_fund_type;
        $donation->save();

        return redirect()->route('donasi.success', $donation->invoice_number)
            ->with('success', 'Donasi berhasil dibuat! Silakan lakukan pembayaran.');
    }

    public function success(string $invoice)
    {
        $donation = Donation::where('invoice_number', $invoice)
            ->where('donor_id', auth()->id())
            ->firstOrFail();

        return view('pages.payment-success', compact('donation'));
    }
}
