<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Control;
use App\Cliente;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ClassLike;


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
        // 30 dias menos
        $dias = Carbon::now()->subDay(30);
        $clientes = Cliente::all();
        $clientestotal = Cliente::count();
        $aumento = Cliente::where([
          ['created_at', '>=', $dias],
          ])->count();
        $num1 = $clientestotal / 100;
        $clientesnuevo = $num1 * $aumento;
        return json_encode([
            "clientes" => $clientes,
            "clientestotal" => $clientestotal,
            "clientesnuevo" => $clientesnuevo,
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
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show');
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
        // $info = Cliente::find($cliente);
        // return $clientes;
        $info = $cliente->id;
        // return $info;
        return view('clientes.edit',compact('info'));
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
                $clientes->update($request->all());
                return "actualizo bien";

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
