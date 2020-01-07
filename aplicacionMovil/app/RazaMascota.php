<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RazaMascota extends Model
{
    //
    protected $table='raza_mascotas';
    protected $primaryKey='id_raza';
    protected $fillable=['raza'];
    protected $hidden=['created_at','updated_at'];

    public function mascota(){
        return $this->hasMany('App\Mascota','raza');
    }



}
