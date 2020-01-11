<?php

namespace App\Http\Controllers;

use App\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        //
    }


    public function registrarMascota(Request $request){
        try{
            $mascota = new Mascota();
            $mascota->nombre = $request->get('nombre');
            $mascota->genero = $request->get('genero');
            $mascota->descripcion = $request->get('descripcion');
            $mascota->edad = $request->get('edad');
            $mascota->estado = $request->get('estado');
            $mascota->dueno = $request->get('dueno');
            $mascota->raza = $request->get('raza');
            $mascota->tipo = $request->get('tipo');
            $mascota->save();
            return response()->json(['log'=>'exito'],200);
        }

        catch(Exception $e){
            return response()->json(['log'=>$e],400);
        }
          
    }


    public function get_all_mascotas(){
        $mascotas =self::auxGetMascotas()->get();
        return response()->json($mascotas);
    }


    public function getMascotasPerdidas(){
        $mascotas = self::auxGetMascotas()->where('estado',0)
        ->get();
        return response()->json($mascotas);
    }

    public function getMascotasAdopcion(){
        $mascotas = self::auxGetMascotas()->where('estado',1)
        ->get();
        return response()->json($mascotas);
    }

    public function auxGetMascotas(){
        return Mascota::select('mascotas.*',"tipo_mascotas.*","raza_mascotas.*","usuarios.*")
        ->join("tipo_mascotas","tipo_mascotas.id_tipo_mascota","=","mascotas.tipo")
        ->join("raza_mascotas","raza_mascotas.id_raza","=","mascotas.raza")
        ->join("usuarios","usuarios.id_usuario","=","mascotas.dueno");
    }

    public function ReportMascotaPerdida(Request $request){
        try{
            $actualizado = Mascota::where('id_mascota','=',$request->get('id_mascota'))->update(['estado'=>$request->get('estado')]);
            if($actualizado ==1){
                return response()->json(['log'=>$actualizado],200); 
            }
            return response()->json(['log'=>"No existe registro con ese ID"],400); 
            

        }catch(Exception $e){
            return response()->json(['log'=>$e],500);
        }
    }





}
