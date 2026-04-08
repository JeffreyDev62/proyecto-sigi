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
        Schema::create('infracciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('cedula')->unique();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->string('placa_vehiculo', 9)->unique();
            $table->string('tipo_infraccion', 255);
            $table->enum('estado', ['Retenido', 'Liberado', 'En fiscalía'])->default('Retenido');
            $table->string('direccion', 255);
            $table->string('numero', 11);
            $table->text('bitacora', 65535);
            $table->json('documentos')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
