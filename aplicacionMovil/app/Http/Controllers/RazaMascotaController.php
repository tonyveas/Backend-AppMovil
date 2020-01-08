<?php

namespace App\Http\Controllers;

use App\RazaMascota;
use Illuminate\Http\Request;

class RazaMascotaController extends Controller
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
     * @param  \App\RazaMascota  $razaMascota
     * @return \Illuminate\Http\Response
     */
    public function show(RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RazaMascota  $razaMascota
     * @return \Illuminate\Http\Response
     */
    public function edit(RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RazaMascota  $razaMascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RazaMascota  $razaMascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(RazaMascota $razaMascota)
    {
        //
    }

    public function get_all_razas(){
        $razas = RazaMascota::all();
        return response()->json($razas);
    }
}
