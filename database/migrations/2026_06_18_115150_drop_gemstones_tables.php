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
        Schema::dropIfExists('gemstone_images');
        Schema::dropIfExists('gemstones');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Leaving empty as this is a cleanup migration and we don't need to rebuild old unused schemas
    }
};
