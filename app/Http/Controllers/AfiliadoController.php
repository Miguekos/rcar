<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use DateTime;
use App\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afiliados.index');
    }

    public function indexapi()
    {
        // 30 dias menos
        $dias = Carbon::now()->subDay(30);
        $afiliados = Afiliado::all();
        $afiliadostotal = Afiliado::count();
        $aumento = Afiliado::where([
          ['created_at', '>=', $dias],
          ])->count();
        $num1 = $afiliadostotal / 100;
        $afiliadosnuevo = $num1 * $aumento;
        return json_encode([
            "afiliados" => $afiliados,
            "afiliadostotal" => $afiliadostotal,
            "afiliadosnuevo" => $afiliadosnuevo,
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
        return view('afiliados.create');
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
        // $afiliado = Afiliado::create($request->all());
        // return $afiliado;
        return Afiliado::create($request->all());
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function show(Afiliado $afiliado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function edit(Afiliado $afiliado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afiliado $afiliado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afiliado $afiliado)
    {
        //
    }
}
