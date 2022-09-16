<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// AGREGO MODELO DE ESTUDIANTE
use App\Models\Estudiante;

class Estudiantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nombre');
            $table->unsignedBigInteger('idCategoria');
            $table->string('celular')->nullable();
            $table->date('fNacimiento')->nullable();
            #$table->integer('edad');
            $table->string('posicion')->nullable();
            $table->string('eps')->nullable();
            $table->string('tiposangre')->nullable();
            $table->string('responsable1')->nullable();
            $table->string('responsable2')->nullable();
            $table->string('celr1')->nullable();
            $table->string('celr2')->nullable();
            $table->foreign('idCategoria')->references('id')->on('categorias');
            $table->timestamps();
        });

        $datosPredeterminados = array(
            [
                'id' => '2589635896',
                'nombre' => 'Pepito Perez',
                'idCategoria' => '12',
                'celular' => '3258885213',
                'fNacimiento' => '',
                'posicion' => 'Defensa',
                'eps' => 'Emssanar',
                'tiposangre' => 'O+',
                'responsable1' => 'Laura Puerres',
                'responsable2' => 'José Rodirguez ',
                'celr1' => '6354864658',
                'celr2' => '4554124455'
            ],

            [
                'id' => '1000000598',
                'nombre' => 'Juan Antonio Gómez Perez',
                'idCategoria' => '10',
                'celular' => '32588852',
                'fNacimiento' => '',
                'posicion' => 'Defensa',
                'eps' => 'Emssanar',
                'tiposangre' => 'O+',
                'responsable1' => 'Laura Puerres',
                'responsable2' => 'José Rodirguez ',
                'celr1' => '63548646548',
                'celr2' => '45541244'
            ],
            [
                'id' => '1333333',
                'nombre' => 'Patrcia Alvares Súñiga',
                'idCategoria' => '1',
                'celular' => '32588852',
                'fNacimiento' => '',
                'posicion' => 'Defensa',
                'eps' => 'Emssanar',
                'tiposangre' => 'O+',
                'responsable1' => 'Laura Puerres',
                'responsable2' => 'José Rodirguez ',
                'celr1' => '111111111',
                'celr2' => '555558855'
            ]
            );

            foreach($datosPredeterminados as $data){
                $estudiante= new Estudiante();
                $estudiante->id = $data['id'];
                $estudiante->nombre = $data['nombre'];
                $estudiante->idCategoria=$data['idCategoria'];
                $estudiante->celular=$data['celular'];
                // $estudiante->fNacimiento=$data['fNacimiento'];
                $estudiante->posicion=$data['posicion'];
                $estudiante->eps=$data['eps'];
                $estudiante->tiposangre=$data['tiposangre'];
                $estudiante->responsable1=$data['responsable1'];
                $estudiante->responsable2=$data['responsable2'];
                $estudiante->celr1=$data['celr1'];
                $estudiante->celr2=$data['celr2'];
                $estudiante->save();
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
        Schema::dropIfExists('estudiantes');
    }
}
