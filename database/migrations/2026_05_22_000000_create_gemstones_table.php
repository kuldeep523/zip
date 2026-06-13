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
        Schema::create('gemstones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category');
            $table->decimal('price', 12, 2);
            $table->decimal('weight_ratti', 5, 2);
            $table->decimal('weight_carat', 5, 2);
            $table->string('shape');
            $table->string('color');
            $table->string('origin');
            $table->string('treatment')->default('Unheated & Untreated');
            $table->string('certification')->default('IGITL Certified');
            $table->string('certificate_no');
            $table->string('image_path');
            $table->text('description')->nullable();
            $table->text('astrological_benefits')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('stock')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gemstones');
    }
};
