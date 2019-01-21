<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autos.index');
    }

    public function indexapi()
    {
        // 30 dias menos
        $dias = Carbon::now()->subDay(30);
        $autos = Auto::all();
        $autostotal = Auto::count();
        $aumento = Auto::where([
            ['created_at', '>=', $dias],
        ])->count();
        $num1 = $autostotal / 100;
        $autosnuevo = $num1 * $aumento;
        return json_encode([
            "autos" => $autos,
            "autostotal" => $autostotal,
            "autosnuevo" => $autosnuevo,
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
        return view('autos.create');
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
        $auto = Auto::create($request->all());
        return $auto;
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
      $autos = Auto::find($auto);
      return view('autos.show',compact('autos'));
    }

    public function showapi(Auto $auto)
    {
      // $autos = Auto::findOrFail($auto);
      // return $auto;
      return response($auto, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        return view(autos.edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        //
    }
}
