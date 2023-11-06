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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('extract')->nullable();
            $table->longText('body')->nullable();
            $table->longText('descripcion')->nullable();

            $table->string('video_url')->nullable();

            $table->enum('status', [1, 2])->default(1);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('postable_type', ['Video', 'Articulo']);
            $table->unsignedBigInteger('postable_id')->nullable(); // Esto contendrá el ID del artículo o video
            $table->integer('visitas')->nullable();
            $table->float('calificacion')->nullable();
           
            $table->timestamps();

            // DEFINICION CLAVES FORANEAS Y EL INDICE POLIMORFICO
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->index(['postable_id', 'postable_type']); // Índice polimórfico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
