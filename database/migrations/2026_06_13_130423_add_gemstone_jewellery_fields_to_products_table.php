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
        Schema::table('products', function (Blueprint $table) {
            $table->string('origin')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('shape')->nullable();
            $table->string('cut')->nullable();
            $table->string('composition')->nullable();
            $table->string('certification_type')->nullable();
            $table->string('certification_no')->nullable();
            $table->string('treatment')->nullable();
            $table->string('dimension_type')->nullable();
            $table->string('color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'origin', 'weight_unit', 'shape', 'cut', 'composition',
                'certification_type', 'certification_no', 'treatment',
                'dimension_type', 'color'
            ]);
        });
    }
};
