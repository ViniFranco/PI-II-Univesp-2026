<?php

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedagogical_records', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlidFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignUlidFor(Enrollment::class)->constrained()->cascadeOnDelete();

            $table->boolean('has_medical_report')->default(false);

            $table->longText('content');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedagogical_records');
    }
};
