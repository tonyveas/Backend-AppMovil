<?php

namespace App\Http\Controllers;

use App\TipoMascota;
use Illuminate\Http\Request;

class TipoMascotaController extends Controller
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
     * @param  \App\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMascota $tipoMascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMascota $tipoMascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMascota $tipoMascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoMascota  $tipoMascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMascota $tipoMascota)
    {
        //
    }


    public function get_all_tipos(){
        $tipos = TipoMascota::all();
        return response()->json($tipos);
    }
}
