<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\DonationSubCategory;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'USER')->get();
        $categories = DonationCategory::with('subCategories')->get();
        $programs = Program::all();
        $staff = User::where('role', '!=', 'USER')->first();

        $donations = [];
        $invoiceCounter = 1001;

        // Generate realistic donation data
        foreach (range(1, 50) as $i) {
            $category = $categories->random();
            $subCategory = $category->subCategories->random();
            $amount = collect([50000, 100000, 250000, 500000, 1000000, 2500000, 5000000])->random();
            $amilAmount = $amount * 0.125; // 12.5% amil
            $netAmount = $amount - $amilAmount;
            
            $isVerified = $i <= 40; // 40 verified, 10 pending
            $program = $i % 3 == 0 ? $programs->random() : null; // Some donations to specific programs
            $donor = $i % 5 == 0 ? null : $users->random(); // Some anonymous

            $donations[] = [
                'invoice_number' => 'INV/' . Carbon::now()->format('Ymd') . '/' . str_pad($invoiceCounter++, 4, '0', STR_PAD_LEFT),
                'donor_id' => $donor?->id,
                'donor_name' => $donor ? $donor->name : 'Hamba Allah',
                'donor_email' => $donor?->email,
                'donor_phone' => $donor?->phone,
                'category_id' => $category->id,
                'sub_category_id' => $subCategory->id,
                'program_id' => $program?->id,
                'amount' => $amount,
                'amil_amount' => $amilAmount,
                'net_amount' => $netAmount,
                'payment_method' => collect(['TRANSFER_BSI', 'TRANSFER_BRI', 'QRIS', 'TUNAI'])->random(),
                'payment_proof' => $isVerified ? 'proofs/proof-' . uniqid() . '.jpg' : null,
                'status' => $isVerified ? 'VERIFIED' : 'PENDING',
                'psak_fund_type' => $category->psak_fund_type,
                'message' => $i % 7 == 0 ? 'Semoga bermanfaat untuk saudara-saudara kita yang membutuhkan. Barakallah.' : null,
                'is_anonymous' => $donor == null,
                'verified_by' => $isVerified ? $staff->id : null,
                'verified_at' => $isVerified ? Carbon::now()->subDays(rand(1, 30)) : null,
                'notes' => null,
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
                'updated_at' => Carbon::now()->subDays(rand(1, 90)),
            ];
        }

        foreach ($donations as $donation) {
            Donation::create($donation);
        }

        $this->command->info('✓ Donations seeded successfully! (50 donations created)');
    }
}
