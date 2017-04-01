<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Cliente;
use Redirect;
use App\Http\Requests\AdminRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //  $this->middleware('auth');
       // $this->middleware('AcessControl');
    }

    public function index()
    {
         $clientes = DB::table('clientes')->paginate(10);
         //dd($users);

        return View::make('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        
       
            $Cliente = new Cliente;
            $Cliente->nome = $request->nome;
            $Cliente->email = $request->email;
            $Cliente->cpf = $request->cpf;
            $Cliente->endereco = $request->endereco;
            $Cliente->telefone = $request->telefone;
            $Cliente->save();     

        return Redirect::route('clientes.create');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $cliente=Cliente::find($id);
            if (is_null($cliente)){
               echo "Cliente Invalido";
               return Redirect::route('clientes.index')->with('Cliente , já esta inativo');
           }

           Cliente::find($id)->delete();

           return redirect()->route('clientes.index')->with('sucesso, Cliente deletado com sucesso');


    }

       public function restore($id)
       {

         Cliente::onlyTrashed()
         ->where('id', $id)
         ->restore();
         return redirect()->route('clientes.index');



     }

}
