<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property $id
 * @property $idEvento
 * @property $idEstudiante
 * @property $pago
 * @property $finalizado
 * @property $created_at
 * @property $updated_at
 *
 * @property Estudiante $estudiante
 * @property Evento $evento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Item extends Model
{

    static $rules = [
		'idEvento' => 'required',
		'idEstudiante' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idEvento','idEstudiante','pago','finalizado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'idEstudiante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evento()
    {
        return $this->hasOne('App\Models\Evento', 'id', 'idEvento');
    }

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'idCategoria');
    }


}
