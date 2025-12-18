<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estimate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('property_type');
            $table->decimal('square_feet', 10, 2);
            $table->json('services');
            $table->decimal('estimate_min', 12, 2);
            $table->decimal('estimate_max', 12, 2);
            $table->decimal('estimate_average', 12, 2);
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('status')->default('new');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_requests');
    }
};
