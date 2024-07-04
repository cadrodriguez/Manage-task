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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->String('name',255);
            $table->String('description',1000);
            // $table->unsignedBigInteger('status_id');
            // $table->foreign('status_id')->references('id')->on('estado');
            // $table->unsignedBigInteger('categoria_id');
            // $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreignId('status_id')->constrained('estado','id');
            $table->foreignId('categoria_id')->constrained('categorias', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
