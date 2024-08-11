<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finanzas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_de_empastado')->nullable();
            $table->string('tipo_de_tramite')->nullable();
            $table->string('n_de_comprobante')->nullable();
            $table->integer('año_de_gestion')->nullable();
            $table->string('mes_de_gestion')->nullable();
            $table->integer('n_de_estante')->nullable();
            $table->integer('n_de_bandeja')->nullable();
            $table->integer('n_de_pasillo')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('finanzas');
    }
}
