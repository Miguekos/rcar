<?php

namespace App\Http\Controllers;

use App\Abono;
use Illuminate\Http\Request;

class AbonoController extends Controller
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

    public function indexapi()
    {
        return Abono::all();
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

    public function storeapi(Request $request)
    {
        $abonos = Abono::create($request->all());
        return $abonos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(Abono $abono)
    {
        //
    }

    public function showapi($abono)
    {
        $abonos = Abono::where('nreserva', '=', $abono)->get();
        $sumaAbonos = Abono::where('nreserva', '=', $abono)->sum('montodepositado');
        // $sinDeuda = Abono::where('nreserva', '=', $abono)->orderby('created_at','DESC')->take(1)->get();
        $sinDeuda = $abonos->last();
        // dd($abonos);
        return response([
          "abono" => $abonos,
          "sumaAbonos" => $sumaAbonos,
          "sinDeuda" => $sinDeuda,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(Abono $abono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abono $abono)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abono $abono)
    {
        //
    }
}
