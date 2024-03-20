<?php
//migration = clases que nos permiten crear y modificar la estructura de la base de datos
//agregar o modificar/eliminar tablas y columnas de la base de datos

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //metodo up para crear o modificar tablas
    public function up(): void
    {
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

     //metodo down eliminar tablas o campos
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};

//en la terminal, php artisan migrate:rollback para eliminar el ultimo lote en la base de datos
//php artisan migrate:rollback --step=1 para eliminar la ultima migracion 
