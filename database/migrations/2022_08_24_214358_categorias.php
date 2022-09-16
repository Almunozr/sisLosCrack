<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// AGREGO MODELO CATEGORIA
use App\Models\Categoria;

class Categorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombrecat')->unique();
            $table->timestamps();
        });


        //Agrego datos Predeterminados
        $datosPredeterminados = array(
            [
                'nombrecat' => 'Cat 2008'

            ],
            [
                'nombrecat' => 'Cat 2009'

            ],
            [
                'nombrecat' => 'Cat 2010'

            ],
            [
                'nombrecat' => 'Cat 2011'

            ],
            [
                'nombrecat' => 'Cat 2012'

            ],
            [
                'nombrecat' => 'Cat 2013'

            ],
            [
                'nombrecat' => 'Cat 2014A'

            ],
            [
                'nombrecat' => 'Cat 2014B'

            ],
            [
                'nombrecat' => 'Cat 2015'

            ],
            [
                'nombrecat' => 'Cat 2016'

            ],
            [
                'nombrecat' => 'Cat 2017'

            ],
            [
                'nombrecat' => 'Cat 2018'

            ],
            [
                'nombrecat' => 'Cat 2019'

            ]
        );

        foreach($datosPredeterminados as $data){
            $categoria = new Categoria();
            $categoria->nombrecat=$data['nombrecat'];
            $categoria->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('categorias');
    }
}
