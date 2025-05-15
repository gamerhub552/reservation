<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('room_id')->constrained()->onDelete('cascade');
        $table->date('checkin_date');
        $table->date('checkout_date');
        $table->integer('guests');
        $table->string('payment_status')->default('pending');
        $table->decimal('payment_amount', 10, 2)->nullable(); // Added payment_amount column
        $table->string('room_number'); // Add this line for room_number
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
