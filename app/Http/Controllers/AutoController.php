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
      $dias = Carbon::now()->subDay(30);
      $autos = Auto::all();
      $total = Auto::count();
      $totaln = Auto::where([
        ['created_at', '>=', $dias],
        ])->count();
      $num1 = $total / 100;
      $totalp = $num1 * $totaln;

      return json_encode([
        'auto' => $autos,
        'total' => $total,
        'totaln' => $totaln,
        'totalp' => $totalp,
      ]); ;

      // $autos = Auto::all();
      // $autost = Auto::count();
      // return json_encode([
      //     "autos" => $autos,
      //     "autost" => $autost,
      // ]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        //
    }

    public function showapi(Auto $auto)
    {
      $autos = Auto::findOrFail($auto);
      return $autos;
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
