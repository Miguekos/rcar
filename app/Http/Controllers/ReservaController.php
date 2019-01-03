<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Promo;
use App\Auto;
use App\Cliente;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function disponibilidad()
     {
       return view('templates.disponibilidad');
     }

    public function index()
    {
      return view('reservas.index');
    }

    public function indexapi()
    {
      $promo = Promo::all();
      $cliente = Cliente::all();
      $auto = Auto::where('estado', '=', 0)->get();
      $reserva = Reserva::count();
        return json_encode([
          'promo' => $promo,
          'cliente' => $cliente,
          'auto' => $auto,
          'reserva' => $reserva
          ]);
    }

    public function reservastotales()
    {
      $preReserva = Reserva::where('estado',1)->get();
      $pendientee = Reserva::where('estado',2)->get();
      $reservaapr = Reserva::where('estado',3)->get();
      $pendiented = Reserva::where('estado',4)->get();
      $liquidacio = Reserva::where('estado',5)->get();

      return  json_encode([
        'preReserva' => $preReserva,
        'pendientee' => $pendientee,
        'reservaapr' => $reservaapr,
        'pendiented' => $pendiented,
        'liquidacio' => $liquidacio,
      ]);


    }

    public function reservascount()
    {
      $preReserva = Reserva::where('estado',1)->count();
      $pendientee = Reserva::where('estado',2)->count();
      $reservaapr = Reserva::where('estado',3)->count();
      $pendiented = Reserva::where('estado',4)->count();
      $liquidacio = Reserva::where('estado',5)->count();

      return  json_encode([
        'preReserva' => $preReserva,
        'pendientee' => $pendientee,
        'reservaapr' => $reservaapr,
        'pendiented' => $pendiented,
        'liquidacio' => $liquidacio,
      ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.create');
    }

    public function createredirect($auto, $fechaI, $fechaF)
    {
      // return $fechaI . $fechaF . $auto;
      $id = $auto;
      $fechaIn = $fechaI;
      $fechaFn = $fechaF;
      return view('reservas.createdis',compact('id','fechaIn','fechaFn'));

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
        $reserva = Reserva::create($request->all());

        Auto::where('id', $request->vehiculo)
            ->update(['estado' => 1]);

        // return $request->vehiculo;
        // return $qwe;
        return $reserva;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    public function showapi(Reserva $reserva)
    {
        return $reserva;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    public function updateapi(Request $request, $reserva)
    {
        // $reservas = Reserva::find($reserva);
        $reservas = Reserva::findOrFail($reserva);
        $input = $request->all();
        $reservas->fill($input)->save();
        return $reservas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    public function cargoalquiler()
    {
      return view('reservas.cargo');
    }

    public function generarcontrato()
    {
      return view('reservas.contrato');
    }
}
