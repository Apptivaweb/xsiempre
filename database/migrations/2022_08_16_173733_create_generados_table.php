<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generados', function (Blueprint $table) {
            $table->id();
            $table->string('slug',67);
            $table->string('nombre',190);
            $table->string('gif')->nullable();
            $table->integer('visitas')->default(0);
            $table->integer('descargas')->default(0);
            $table->boolean('publicado')->default(0);
            $table->boolean('generado')->default(0);
            $table->foreignId('plantilla_id')->references('id')->on('plantillas');
            $table->foreignId('nombre1_id')->references('id')->on('nombres');
            $table->foreignId('nombre2_id')->references('id')->on('nombres');            
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
        Schema::dropIfExists('generados');
    }
};
