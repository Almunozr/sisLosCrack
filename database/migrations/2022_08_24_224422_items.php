<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('items', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idEvento');
            $table->string('idEstudiante');
            // $table->integer('pago')->nullable()->default(0);
            $table->boolean('finalizado')->nullable()->default(false);
            $table->foreign('idEstudiante')->references('id')->on('estudiantes'); //Que se borre Item cuando borro evento
            $table->foreign('idEvento')->references('id')->on('eventos')->onDelete("cascade");

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
        //
        Schema::dropIfExists('items');
    }
}
