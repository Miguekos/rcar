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
        // dd($abonos);
        return $abonos;
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
