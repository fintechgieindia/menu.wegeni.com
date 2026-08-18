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
        Schema::table('menu_items', function (Blueprint $table) {
                    $table->unsignedBigInteger('batch_recipe_id')->nullable()->after('in_stock');
        $table->integer('batch_serving_size')->nullable()->after('batch_recipe_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
                    $table->dropColumn(['batch_recipe_id', 'batch_serving_size']);

        });
    }
};
