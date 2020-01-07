<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table='usuarios';
    protected $primaryKey='id_usuario';
    protected $fillable=['cedula','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','usuario','contrasena','correo','telefono','direccion'];
    protected $hidden=['created_at','updated_at'];


    public function mascotas(){
        return $this->hasMany('App\Mascota','dueno');
    }



}
