<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 *
 * @property $id
 * @property $nombre
 * @property $idCategoria
 * @property $celular
 * @property $fNacimiento
 * @property $posicion
 * @property $eps
 * @property $tiposangre
 * @property $responsable1
 * @property $responsable2
 * @property $celr1
 * @property $celr2
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Item[] $items
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{

    static $rules = [
		'id' => 'required',
        'nombre' => 'required',
		'idCategoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','idCategoria','celular','fNacimiento','posicion','eps','tiposangre','responsable1','responsable2','celr1','celr2','detalle'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'idCategoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Item', 'idEstudiante', 'id');
    }


}
