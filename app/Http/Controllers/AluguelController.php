<?php

namespace App\Http\Controllers;
use App\Aluguel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use View;
use Redirect;
use App\Cliente;
use App\Veiculo;
use Illuminate\Support\Facades\Input;
use Response;
class AluguelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajax(){
        $cat_id = Input::get('cat_id');
        ($cat_id);

        $modelo= DB::table('veiculos')->where('id', '=', $cat_id)->get();

        return Response::json($modelo);

    }
    public function index()
    {
        $marcas= DB::table('veiculos')->where('deleted_at', '=', NULl)->get();
        $Clientes =DB::table('clientes')->where('deleted_at', '=', NULl)->get();
       // $Clientes =DB::table('clientes')->pluck('nome','id');
        return View::make('alugel.index', compact('Clientes','marcas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     *@return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Alugel = new Aluguel;
        $Alugel->idVeiculo = $request->idVeiculo;
        $Alugel->idCliente = $request->idCliente;
        $Alugel->dataLocacao = $request->dataLocacao;
        $Alugel->dataDevolucao = $request->dataDevolucao;
        $Alugel->pagamento = $request->pagamento;
        $Alugel->save();     
        return redirect()->route('alugeis.index')->with('status', 'Locação Realizada com Sucesso!');        
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
        //
    }
}
