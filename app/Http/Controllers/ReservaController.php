<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Promo;
use App\Auto;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
      $auto = Auto::where('disponible', '=', 1)->get();
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
            ->update(['estado' => 0]);
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

    public function destroyapi(Reserva $reserva)
    {
      $reservas  = Reserva::findOrFail($reserva);
      $reserva->delete();
      DB::table('autos')
               ->where('id', $reserva->vehiculo)
               ->update(['disponible' => 1]);

      return $reservas;
    }

    public function generarcontrato($cliente, $auto,  $reserva)
    {
      $clientes = Cliente::find($cliente);
      $autos = Auto::find($auto);
      $reservas = Reserva::where('nreserva', $reserva)->get();
      return view('reservas.contrato',compact('clientes','autos','reservas'));
    }

    public function cargoalquiler($cliente, $auto,  $reserva)
    {
      // return $request->all();
      $clientes = Cliente::find($cliente);
      $autos = Auto::find($auto);
      $reservas = Reserva::where('nreserva', $reserva)->get();
      return view('reservas.cargo',compact('clientes','autos','reservas'));
    }

    // public function generarcontrato($cliente, $auto)
    // {
    //   // return "lleg aui";
    //   return response([
    //     'clietne' => $cliente,
    //     'auto' => $auto
    //   ]);
    //   // return view('reservas.contrato');
    // }

}
