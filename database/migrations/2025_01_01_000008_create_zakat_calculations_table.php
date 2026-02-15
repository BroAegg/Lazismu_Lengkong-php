<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zakat_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('type', 30); // penghasilan, emas, fitrah
            $table->json('input_data');
            $table->decimal('nisab_value', 15, 2);
            $table->boolean('is_wajib')->default(false);
            $table->decimal('zakat_amount', 15, 2);
            $table->timestamp('calculated_at');
            $table->timestamps();

            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zakat_calculations');
    }
};
