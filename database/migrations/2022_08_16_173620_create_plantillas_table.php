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
        Schema::create('plantillas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150)->unique();
            $table->text('frase')->nullable();
            $table->text('top')->nullable();
            $table->text('bottom')->nullable();
            
            $table->string('gif')->nullable();
            $table->string('gif_descargas')->nullable();
            $table->string('gif_nombretop')->default(250);
            $table->string('gif_nombreleft')->default(250);            
            $table->string('gif_nombrestrokecolor',7)->default("black");
            $table->integer('gif_nombrestrokewidth')->default(0);
            $table->integer('gif_nombrefontsize')->default(25);
            $table->string('gif_nombrefontcolor',7)->default("white");
            $table->string('gif_frasetop')->default(250);
            $table->string('gif_fraseleft')->default(250);            
            $table->string('gif_frasestrokecolor',7)->default("black");
            $table->integer('gif_frasestrokewidth')->default(0);
            $table->integer('gif_frasefontsize')->default(25);
            $table->string('gif_frasefontcolor',7)->default("white");

            $table->string('png')->nullable();
            $table->string('png_descargas')->nullable();
            $table->string('png_fototop')->default(250);
            $table->string('png_fotoleft')->default(250);            
            $table->string('png_nombrestrokecolor',7)->default("black");
            $table->integer('png_nombrestrokewidth')->default(0);
            $table->integer('png_nombrefontsize')->default(25);
            $table->string('png_nombrefontcolora',7)->default("white");
            $table->string('png_nombrefontcolorb',7)->default("white");
            $table->string('png_frasetop')->default(250);
            $table->string('png_fraseleft')->default(250);            
            $table->string('png_frasestrokecolor',7)->default("black");
            $table->integer('png_frasestrokewidth')->default(0);
            $table->integer('png_frasefontsize')->default(25);
            $table->string('png_frasefontcolor',7)->default("white");
            $table->string('png_frasewidth')->default(400);
            $table->string('png_fraseheight')->default(100);

            $table->string('marco')->nullable();
            $table->string('marco_descargas')->nullable();
            $table->string('marco_nombretop')->default(250);
            $table->string('marco_nombreleft')->default(250);            
            $table->string('marco_nombrestrokecolor',7)->default("black");
            $table->integer('marco_nombrestrokewidth')->default(0);
            $table->integer('marco_nombrefontsize')->default(25);
            $table->string('marco_nombrefontcolor',7)->default("white");
            $table->string('marco_frasetop')->default(250);
            $table->string('marco_fraseleft')->default(250);            
            $table->string('marco_frasestrokecolor',7)->default("black");
            $table->integer('marco_frasestrokewidth')->default(0);
            $table->integer('marco_frasefontsize')->default(25);
            $table->string('marco_frasefontcolor',7)->default("white");
            $table->integer('visitas')->default(0);
            $table->boolean('publicado')->default(0);// 0 = no publicado // 1 = publicado
            $table->foreignId('font1_id')->references('id')->on('fonts');
            $table->foreignId('font2_id')->references('id')->on('fonts');
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
        Schema::dropIfExists('plantillas');
    }
};
