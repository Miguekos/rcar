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
        // $abonos = Abono::where('nreserva', '=', $abono)->get();
        $abonosRe = Abono::where([
          ['nreserva', '=', $abono],
          ['abonoprereserva', '=', 1],
          ])->get();
        $abonosLi = Abono::where([
          ['nreserva', '=', $abono],
          ['abonoliquidacion', '=', 1],
          ])->get();

        $sumaAbonosRe = Abono::where([
          ['nreserva', '=', $abono],
          ['abonoprereserva', '=', 1],
          ])->sum('montodepositado');
        $sumaAbonosLi = Abono::where([
          ['nreserva', '=', $abono],
          ['abonoliquidacion', '=', 1],
          ])->sum('montodepositado');

        // $sumaAbonos = Abono::where('nreserva', '=', $abono)->sum('montodepositado');
        // $sinDeuda = Abono::where('nreserva', '=', $abono)->orderby('created_at','DESC')->take(1)->get();
        $sinDeudaRe = $abonosRe->last();
        $sinDeudaLi = $abonosLi->last();
        // dd($abonos);
        return response([
          "abonore" => $abonosRe,
          "abonoli" => $abonosLi,
          "sumaAbonosre" => $sumaAbonosRe,
          "sumaAbonosli" => $sumaAbonosLi,
          "sinDeudare" => $sinDeudaRe,
          "sinDeudali" => $sinDeudaLi,
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

    public function destroyapi(Abono $abono)
    {
        $abonos  = Abono::findOrFail($abono);
        $abono->delete();
//        return redirect()->route('cliente.index')->with('flash','Se elimino el cliente correctamente..!!');
        return $abonos;

    }
}
