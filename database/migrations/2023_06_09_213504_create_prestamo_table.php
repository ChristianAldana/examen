<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

     Schema::create('prestamo', function (Blueprint $table) {
         $table->id();
         $table->String('usuario', 175);
         $table->String('fecha_prestamo', 150);
         $table->String('fecha_devolucion', 150);

         $table->unsignedBigInteger('libro_id')->nullable();
         $table->foreign('libro_id')->references('id')->on('libro')->onDelete('no action');
         $table->timestamps();

     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamo');

    }
}
