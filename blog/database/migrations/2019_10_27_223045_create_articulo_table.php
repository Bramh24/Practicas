<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->string('codigo', 50);
            $table->string('nombre', 250);
            $table->decimal('precio_venta', 11,2);
            $table->integer('stock');
            $table->string('descripcion', 256);
            $table->boolean('condicion')->default(1);
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
        Schema::dropIfExists('articulo');
    }
}
