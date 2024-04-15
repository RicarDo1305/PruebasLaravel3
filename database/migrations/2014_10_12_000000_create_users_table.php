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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('aparterno')->nullable();
            $table->string('amaterno')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('noControl')->unique()->nullable();
            $table->string('rol')->nullable();
            $table->string('sexo')->nullable();
            $table->string('carrera')->nullable();
            $table->string('semestre')->nullable();
            $table->string('club')->nullable();
            $table->string('nss')->nullable();
            $table->string('curp')->nullable();
            $table->string('fechaingreso')->nullable();
            $table->string('tiposangre')->nullable();
            $table->string('nombretutor')->nullable();
            $table->string('telefonotutor')->nullable();
            $table->string('padecimiento')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('telefonoparticular')->nullable();
            $table->string('estatura')->nullable();
            $table->string('peso')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
