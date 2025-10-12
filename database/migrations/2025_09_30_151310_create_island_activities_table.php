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
        Schema::create('island_activities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('islands_id')->references("id")->on("islands");
            $table->foreignId('spv_id')->references("id")->on("users");
            $table->foreignId('times_id')->references("id")->on("times");
            $table->foreignId('activities_id')->references("id")->on("activities");
            $table->date('date');
            $table->string('brand');
            $table->string('product_type');
            $table->unsignedBigInteger('sales');
            $table->string("photo");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('island_activities');
    }
};
