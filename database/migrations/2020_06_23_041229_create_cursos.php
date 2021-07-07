<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->float('price');
            $table->longText('description')->nullable();
            $table->foreignId('docente_id')->constrained()->onDelete('cascade');
            $table->string('link')->nullable();
            $table->string('youtubelink')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();
        });
  
    }

    /**s
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
