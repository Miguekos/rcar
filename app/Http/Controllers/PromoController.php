<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('promos.index');
    }

    // public function indexapi()
    // {
    //   $dias = Carbon::now()->subDay(30);
    //   $promos = Promo::all();
    //   $total = Promo::count();
    //   $totaln = Promo::where([
    //     ['created_at', '>=', $dias],
    //     ])->count();
    //   $num1 = $total / 100;
    //   $totalp = $num1 * $totaln;
    //
    //   return json_encode([
    //     'promo' => $promos,
    //     'total' => $total,
    //     'totaln' => $totaln,
    //     'totalp' => $totalp,
    //   ]); ;
    // }

    public function indexapi()
    {
        // 30 dias menos
        $dias = Carbon::now()->subDay(30);
        $promos = Promo::all();
        $promostotal = Promo::count();
        $aumento = Promo::where([
          ['created_at', '>=', $dias],
          ])->count();
        $num1 = $promostotal / 100;
        $promosnuevo = $num1 * $aumento;
        return json_encode([
            "promos" => $promos,
            "promostotal" => $promostotal,
            "promosnuevo" => $promosnuevo,
            "aumento" => $aumento,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // return "sADasdasd";
        return view('promos.create');
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
        $Promo = Promo::create($request->all());
        return $Promo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    public function showapi(Promo $promo)
    {
      // $promos = Promo::findOrFail($promo);
      // return $promos;
      return $promo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
      $info = $promo->id;
      // return $info;
      return view('promos.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    public function updateapi(Request $request, $promo)
    {
      $clientes = Promo::find($promo);
      $clientes->update($request->all());
      return $clientes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        //
    }

    public function destroyapi(Promo $promo)
    {
      $clientes  = Promo::findOrFail($cliente);
      $cliente->delete();
      return $clientes;
    }
}
