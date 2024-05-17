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
        Schema::create('plan_evaluation', function (Blueprint $table) {
            $table->integer('evaluation_id')->primary();
            $table->integer('user_id');
            $table->integer('plan_id');
            $table->smallInteger('rating');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('plan_id')->on('plan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_evaluation');
    }
};
