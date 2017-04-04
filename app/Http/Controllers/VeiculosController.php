<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Veiculo;
use Redirect;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\VeiculoRequest;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AcessFunc');
    }

    public function index()
    {
        $veiculos = DB::table('veiculos')->paginate(5);
        //dd($users);

        return View::make('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('veiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VeiculoRequest $request)
    {
        $Veiculo = new Veiculo;
        $Veiculo->ano = $request->ano;
        $Veiculo->modelo = $request->modelo;
        $Veiculo->marca = $request->marca;
        $Veiculo->placa = $request->placa;
        $Veiculo->valor_aluguel = $request->valor_aluguel;
        $Veiculo->cor = $request->cor;
        $Veiculo->ativo = 1;
        $Veiculo->save();
        return redirect()->route('veiculos.index')->with('status', 'Veiculo Cadastrado com Sucesso!');
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
        $Veiculos = Veiculo::find($id);
        if (is_null($Veiculos)){
            ?>
            <script>alert('Usuário Está Desabilitado')</script>
            <?php

            return Redirect::route('veiculos.index');
        }

        return view('veiculos.edit', compact('Veiculos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VeiculoRequest $request, $id)
    {
        $Veiculo = Veiculo::find($id);

        $Veiculo->ano = $request->ano;
        $Veiculo->modelo = $request->modelo;
        $Veiculo->marca = $request->marca;
        $Veiculo->placa = $request->placa;
        $Veiculo->valor_aluguel = $request->valor_aluguel;
        $Veiculo->cor = $request->cor;
        $Veiculo->ativo = 1;
        $Veiculo->save();
        return redirect()->route('veiculos.index')->with('status', 'Veiculo Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculo=Veiculo::find($id);

        if (is_null($veiculo)){
           echo "Veiculo Invalido";
           return Redirect::route('veiculos.index')->with('Veiculo , já esta inativo');
        }

        Veiculo::find($id)->delete();

        return redirect()->route('veiculos.index')->with('status, Veiculo deletado com sucesso');
    }

    public function restore($id)
    {
        Veiculo::onlyTrashed()
        ->where('id', $id)
        ->restore();
        return redirect()->route('veiculos.index');
    }

}
