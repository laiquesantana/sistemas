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
use App\Http\Requests\AluguelRequest;
class AluguelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {
        // $marcas= DB::table('veiculos')->select('marca')->where('deleted_at', '=', NULl)->groupBy('marca')->get();
        // $Clientes =DB::table('clientes')->where('deleted_at', '=', NULl)->get();
        // return View::make('alugeis.index', compact('Clientes','marcas'));
        $alugueis = DB::table('alugueis')->select("alugueis.id as idAluguel", "idVeiculo", "idCliente", "dataLocacao", "dataDevolucao", "pagamento", "disponivel", "modelo", "marca", "placa", "ativo", "valor_aluguel", "cor", "name", "ano")
                    ->leftJoin('veiculos', 'alugueis.idVeiculo', '=', 'veiculos.id')
                    ->leftJoin('users', 'alugueis.idCliente', '=', 'users.id')
                    ->paginate(5);
        return View::make('alugeis.index', compact('alugueis'));
    }

    public function indexUser($id)
    {
        $alugueis = DB::table('alugueis')->select("alugueis.id as idAluguel", "idVeiculo", "idCliente", "dataLocacao", "dataDevolucao", "pagamento", "disponivel", "modelo", "marca", "placa", "ativo", "valor_aluguel", "cor", "name", "ano")
                    ->leftJoin('veiculos', 'alugueis.idVeiculo', '=', 'veiculos.id')
                    ->leftJoin('users', 'alugueis.idCliente', '=', 'users.id')
                    ->where("idCliente", "=", $id)
                    ->paginate(5);
        return View::make('alugeis.index', compact('alugueis'));
    }


    /**
     * Show the form for creating a new resource.
     *
     *@return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas= DB::table('veiculos')->select('marca')->where('deleted_at', '=', NULl)->groupBy('marca')->get();
        $Clientes =DB::table('users')->where('deleted_at', '=', NULl)->where("perfil", "=", "user")->get();
        return View::make('alugeis.create', compact('Clientes','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AluguelRequest $request)
    {
       
        $Alugel = new Aluguel;
        $Alugel->idVeiculo = $request->idVeiculo;
        $Alugel->idCliente = $request->idCliente;
        $Alugel->dataLocacao = $request->dataLocacao;
        $Alugel->dataDevolucao = $request->dataDevolucao;
        $Alugel->pagamento = $request->pagamento;
        $Alugel->disponivel = 0;

        $Alugel->save();   

        DB::table('veiculos')
            ->where('id', $request->idVeiculo)
            ->update(array('ativo' => 0));

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
        $aluguel=Aluguel::find($id);

        if (is_null($aluguel)){
           echo "Aluguel Invalido";
           return Redirect::route('alugeis.index')->with('Veiculo , já esta inativo');
        }

        Aluguel::find($id)->delete();

        return redirect()->route('alugeis.index')->with('status, Entrada deletada com sucesso');
    }

    public function devolucao($id)
    {
        DB::table('alugueis')
            ->where('id', $id)
            ->update(array('disponivel' => 1));

        $aluguel=Aluguel::find($id);


        DB::table('veiculos')
            ->where('id', $aluguel->idVeiculo )
            ->update(array('ativo' => 1));
            
        return redirect()->route('alugeis.index')->with('status, Veiculo Devolvido');
    }

}
