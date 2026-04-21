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
        Schema::table('site_settings', function (Blueprint $table) {
            // Calculator section visibility toggle
            $table->boolean('show_calculator')->default(true)->after('footer_scripts');

            // Footer contact details
            $table->string('footer_tagline')->nullable()->after('show_calculator');
            $table->string('footer_copyright')->nullable()->after('footer_tagline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['show_calculator', 'footer_tagline', 'footer_copyright']);
        });
    }
};
