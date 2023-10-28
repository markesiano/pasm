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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('rol');                                        //Se agrega el campo "rol"
            $table->enum('status', [1, 2])->default(1);                 //Se agrega el campo "status" principalmente para los Psicólogos que requieren certificado
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('certificado_file')->nullable();             //Se agrega el campo "certificado_file" para guardar el nombre del archivo del certificado
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
