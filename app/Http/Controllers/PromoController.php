<?php

namespace App\Http\Controllers;

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

    public function indexapi()
    {
      $promos = Promo::all();
      return $promos;
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
      $promos = Cliente::findOrFail($promo);
      return $promos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
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

    public function updateapi(Request $request, Promo $promo)
    {
      $clientes = Promo::find($promo);
      $clientes ->nombre = $request->nombre;
      $clientes ->vigencia = $request->vigencia;
      $clientes ->direccion = $request->dias_pagados;
      $clientes ->celular = $request->dias_libres;
      $clientes ->save();
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
