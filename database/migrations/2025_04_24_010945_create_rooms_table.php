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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('room_type')->nullable();
            $table->integer('room_count')->nullable();
            $table->text('room_numbers')->nullable();
            $table->decimal('room_rate', 8, 2)->nullable();
            $table->integer('capacity')->nullable();
            $table->text('room_description')->nullable();
            $table->string('room_front_image')->nullable();
            $table->longText('room_images')->nullable();
            $table->timestamps();
        });
        
    }};