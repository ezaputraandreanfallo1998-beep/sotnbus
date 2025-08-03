<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origin_id')->constrained('cities');
            $table->foreignId('destination_id')->constrained('cities');
            $table->foreignId('bus_id')->constrained();
            $table->time('departure_time');  // Kolom waktu (bukan string)
            $table->time('arrival_time');    // Kolom waktu (bukan string)
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bus_routes');
    }
};