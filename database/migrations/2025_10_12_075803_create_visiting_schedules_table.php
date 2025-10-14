<?php

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
        Schema::create('visiting_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spv_id')->references("id")->on("users");
            $table->foreignId('community_partnerships_id')->references("id")->on("community_partnerships");
            $table->date('start_date');
            $table->date('end_date');
            $table->text('week');
            $table->year('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiting_schedules');
    }
};
