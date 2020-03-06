<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('price')->default(0);
            $table->integer('time');
            $table->boolean('days'); //1:days 0:weeks
            $table->text('notes');
            $table->boolean('last');
            $table->integer('type'); //1:Solicitud inicial 2:Contra oferta 3:Aceptada 4:Rechazada
            $table->integer('user_id_from');
            $table->integer('user_id_to');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->softDeletes();
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
        Schema::dropIfExists('bids');
    }
}
