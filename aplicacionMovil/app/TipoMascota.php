<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMascota extends Model
{
    //
    protected $table='tipo_mascotas';
    protected $primaryKey='id_tipo_mascota';
    protected $fillable =['tipo'];
    protected $hidden =['created_at','updated_at'];


    public function mascota(){
        return $this->hasMany('App\Mascota','tipo');
    }


}
