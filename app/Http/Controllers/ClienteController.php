<?php

namespace App\Http\Controllers;

// use App\Cliente;
// use Illuminate\Http\Request;

use App\User;
use App\Control;
use App\Cliente;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes.index');
    }

    public function indexapi()
    {
        $cliente = Cliente::all();
        // $clientesd = Cliente::where('deuda',0.00)->get();
        return json_encode([
            "cliente" => $cliente,
            // "clientesd" => $clientesd
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
        $cliente = Cliente::create($request->all());
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    public function showapi($cliente)
    {
      $clientes = Cliente::findOrFail($cliente);
      return $clientes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function updateapi(Request $request, $cliente)
    {

                $clientes = Cliente::find($cliente);
                $clientes ->nombres = $request->nombres;
                $clientes ->dni = $request->dni;
                $clientes ->direccion = $request->direccion;
                $clientes ->celular = $request->celular;
                $clientes ->save();
                return $clientes;
    //   $clientes  = Cliente::find($cliente);
    //   return $clientes;
    //   $input = $request->all();
    //   return $input;
    //   $clientes->fill($input)->save();
    // Cliente::findOrFail($cliente)->first()->update($request->all())->save();
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function destroyapi(Cliente $cliente)
    {
        $clientes  = Cliente::findOrFail($cliente);
        $cliente->delete();
//        return redirect()->route('cliente.index')->with('flash','Se elimino el cliente correctamente..!!');
        return $clientes;

    }
}
