<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->text('video');	
			$table->integer('image');
			$table->text('texte');
			$table->text('name');
			$table->integer('col');
			$table->integer('ligne');
			$table->integer('taille');
			$table->string('colortop');
			$table->string('colorbot');	
			$table->string('table');
			
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
        Schema::dropIfExists('videos');
    }
}
