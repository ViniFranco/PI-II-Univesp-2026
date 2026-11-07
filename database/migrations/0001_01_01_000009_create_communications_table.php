<?php

use App\Enums\CommunicationChannels;
use App\Enums\CommunicationReturnStatus;
use App\Models\Student;
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
        Schema::create('communications', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlidFor(Student::class)->constrained()->cascadeOnDelete();
            $table->foreignUlidFor(User::class)->constrained()->cascadeOnDelete();

            $table->enum('communication_channel', array_column(CommunicationChannels::cases(), 'value'));
            $table->enum('communication_return_status', array_column(CommunicationReturnStatus::cases(), 'value'));

            $table->longText('description');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};
