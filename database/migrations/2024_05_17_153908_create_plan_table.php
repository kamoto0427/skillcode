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
        Schema::create('plan', function (Blueprint $table) {
            $table->integer('plan_id')->primary();
            $table->integer('user_id');
            $table->integer('tag_id');
            $table->string('plan_title', 50);
            $table->longText('plan_explanation');
            $table->smallInteger('plan_status');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('tag_id')->references('tag_id')->on('tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
