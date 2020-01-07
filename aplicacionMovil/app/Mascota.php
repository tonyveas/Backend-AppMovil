<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $table='mascotas';
    protected $primaryKey='id_mascota';

    protected $fillable=['nombre','genero','descripcion','edad','estado','dueno','raza','tipo'];

    protected $hidden=['created_at','updated_at'];

    public function usuario(){
        return $this->belongsTo('App\Usuario','id_usuario');
    }

    public function raza(){
        return $this->belognsTo('App\RazaMascota','id_raza');
    }

    public function tipo(){
        return $this->belongsTo('App\TipoMascota','id_tipo_mascota');
    }




}
