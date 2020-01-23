<?php

namespace App\Http\Controllers;

use App\Mascota;
use App\Usuario;
use Illuminate\Http\Request;
use DB;


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



    public function consultarMascotas(Request $request){
        $m = DB::table('mascotas')
        ->join('raza_mascotas','mascotas.raza','=','raza_mascotas.id_raza')
        ->join('tipo_mascotas','mascotas.tipo','=','tipo_mascotas.id_tipo_mascota')
        ->select('mascotas.id_mascota','mascotas.nombre','mascotas.genero','mascotas.descripcion','mascotas.edad','mascotas.estado','tipo_mascotas.tipo','raza_mascotas.raza')
        ->where('mascotas.tipo','=',$request->get('tipo'))->get();
        return response()->json($m);
    }


    public function consultarMascotaPorId(Request $request){
        $mascota = Mascota::find($request->input('id_mascota'));
        return response()->json($mascota);
    }

    public function consultarMisMascotas(Request $request){
        $mascotas = DB::table('mascotas')
        ->join('raza_mascotas','mascotas.raza','=','raza_mascotas.id_raza')
        ->join('tipo_mascotas','mascotas.tipo','=','tipo_mascotas.id_tipo_mascota')
        ->join('usuarios','mascotas.dueno','=','usuarios.id_usuario')
        ->select('mascotas.id_mascota','mascotas.nombre','mascotas.genero','mascotas.descripcion','mascotas.edad','mascotas.estado','tipo_mascotas.tipo','raza_mascotas.raza','usuarios.cedula','usuarios.primer_nombre','usuarios.primer_apellido','usuarios.cedula','usuarios.usuario','usuarios.correo',)
        ->where('mascotas.dueno','=',$request->input('dueno'));
        if($request->get("busqueda")!=null && $request->get("busqueda")!=""){
            $mascotas = $mascotas->where('tipo_mascotas.tipo','like',"%".$request->get("busqueda")."%")->get();
            return response()->json($mascotas);
        }
        return response()->json($mascotas->get());
    }



    public function realizarAdopcion(Request $request){
        try{
            $user = Usuario::Where("cedula","=",$request->input('dueno'))->first();
            if($user==null){
                return response()->json(['log'=>"El Usuario Ingresado No Existe!","confirm"=>false],400);
            }
            $mascota = Mascota::where('id_mascota','=',$request->input('id_mascota'))->update(['dueno'=> $user->id_usuario,'estado'=> 2]);

            if($mascota == 1){
                return response()->json(['log'=>"Mascota cambiada de dueño correctamente","confirm"=>true],200);
            }
        }catch(Exception $e){
            return response()->json(['log'=>$e],500);
        }
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

    public function consultarPorEstado(Request $request){
        $mascotas = self::auxMascotasBusq($request)->where('estado',$request->get('estado'))
        ->get();
        return response()->json($mascotas);
    }


    public function consultarPerdidas(Request $request){
        $mascotas = self::auxMascotasBusq($request)->where('estado',0)
        ->get();
        return response()->json($mascotas);
    }

    public function consultarAdopciones(Request $request){
        $mascotas = self::auxMascotasBusq($request)->where('estado',1)
        ->get();
        return response()->json($mascotas);
    }


    public function auxGetMascotas(){
        return Mascota::select('mascotas.*',"tipo_mascotas.*","raza_mascotas.*","usuarios.*")
        ->join("tipo_mascotas","tipo_mascotas.id_tipo_mascota","=","mascotas.tipo")
        ->join("raza_mascotas","raza_mascotas.id_raza","=","mascotas.raza")
        ->join("usuarios","usuarios.id_usuario","=","mascotas.dueno");
    }

    public function auxMascotasBusq(Request $request)
    {
        $mascotas = self::auxGetMascotas();
        if($request->get("busqueda")!=null && $request->get("busqueda")!=""){
            return $mascotas->where('tipo_mascotas.tipo','like',"%".$request->get("busqueda")."%");
        }
        return $mascotas;

    }

    public function cambiarEstadoMascota(Request $request){
        try{
            $actualizado = Mascota::where('id_mascota','=',$request->get('id_mascota'))
            ->update(['estado'=>$request->get('estado')]);
            if($actualizado ==1){
                return response()->json(['log'=>$actualizado],200);
            }
            return response()->json(['log'=>"No existe registro con ese ID"],400);


        }catch(Exception $e){
            return response()->json(['log'=>$e],500);
        }
    }

    public function ReportarMascotaPerdida(Request $request){
        try{
            $actualizado = Mascota::where('id_mascota','=',$request->get('id_mascota'))
            ->update(['estado'=>0]);
            if($actualizado ==1){
                return response()->json(['log'=>$actualizado],200);
            }
            return response()->json(['log'=>"No existe registro con ese ID"],400);


        }catch(Exception $e){
            return response()->json(['log'=>$e],500);
        }
    }

    public function registrarAdopcion(Request $request){
        try{

            $mascota = Mascota::where('id_mascota','=',$request->input('id_mascota'))
            ->update(['estado'=>1]);
            if($mascota == 1){
                return response()->json(['log'=>$mascota],200);
            }
            return response()->json(['log'=>'No existe registro con ese ID'],400);
            }catch(Exception $e){
                return response()->json(['log'=>$e],500);
            }

    }

    public function ReportarMascotaEncontrada(Request $request){
        try{
            $actualizado = Mascota::where('id_mascota','=',$request->get('id_mascota'))
            ->update(['estado'=>2]);
            if($actualizado ==1){
                return response()->json(['log'=>$actualizado],200);
            }
            return response()->json(['log'=>"No existe registro con ese ID"],400);


        }catch(Exception $e){
            return response()->json(['log'=>$e],500);
        }
    }





}
