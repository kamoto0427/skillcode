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
        Schema::create('tag', function (Blueprint $table) {
            $table->integer('tag_id')->primary();
            $table->integer('category_id');
            $table->string('tag_name', 10);
            $table->timestamps();

            // 外部キー制約
            $table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag');
    }
};
