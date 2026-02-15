<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->nullable()->constrained('programs')->nullOnDelete();
            $table->foreignId('mustahik_id')->constrained('mustahik');
            $table->decimal('amount', 15, 2);
            $table->string('asnaf_category', 30);
            $table->string('psak_fund_type', 50);
            $table->text('description')->nullable();
            $table->timestamp('distributed_at')->nullable();
            $table->foreignId('distributed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('evidence_photo')->nullable();
            $table->timestamps();

            $table->index(['asnaf_category', 'distributed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributions');
    }
};
