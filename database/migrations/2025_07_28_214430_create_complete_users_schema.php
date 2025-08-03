<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Hapus tabel jika sudah ada (untuk development saja)
        Schema::dropIfExists('promotion_user');
        Schema::dropIfExists('promos');
        Schema::dropIfExists('bus_routes');
        Schema::dropIfExists('buses');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');

        // Buat tabel users dengan struktur lengkap
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        // Buat tabel password_resets
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Buat ulang semua tabel yang diperlukan
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('postal_code');
            $table->timestamps();
        });

        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->unique();
            $table->string('brand');
            $table->integer('capacity');
            $table->timestamps();
        });

        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origin_id')->constrained('cities');
            $table->foreignId('destination_id')->constrained('cities');
            $table->foreignId('bus_id')->constrained('buses');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('discount', 5, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('promotion_user', function (Blueprint $table) {
            $table->foreignId('promotion_id')->constrained('promos');
            $table->foreignId('user_id')->constrained('users');
            $table->primary(['promotion_id', 'user_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotion_user');
        Schema::dropIfExists('promos');
        Schema::dropIfExists('bus_routes');
        Schema::dropIfExists('buses');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
    }
};