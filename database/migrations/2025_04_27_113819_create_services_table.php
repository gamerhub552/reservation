<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('service_type')->nullable();        // (e.g., Included, Restaurant)
            $table->string('service_sub_type')->nullable();     // (optional sub-category)
            $table->decimal('price', 8, 2)->nullable();          // ₱12345.67
            $table->text('service_description')->nullable();    // Longer description
            $table->string('service_front_image')->nullable();   // **Front image only**
            $table->boolean('is_active')->default(true);        // Whether service is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
