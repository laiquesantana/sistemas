<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
$modelo= DB::table('veiculos')->select("veiculos.id AS idV", "modelo", "marca", "disponivel", "deleted_at", "ativo")->leftJoin('alugueis', 'alugueis.idVeiculo', '=', 'veiculos.id')->whereRaw($query." deleted_at is null and ativo = 1 and (disponivel = 1 or disponivel is null) ")->groupBy("idV", "modelo", "marca", "disponivel", "deleted_at", "ativo")->get();
*/

Route::get('/ajax-marca1',function() {
     $cat_id = Input::get('cat_id');
     $locacao = Input::get('locacao');
     $devolucao = Input::get('devolucao');

     isset($cat_id) ? $query = "marca = '". $cat_id ."' AND" : $query = '';
     isset($locacao) ? $query .= "( (dataDevolucao < '". $locacao ."' OR" : $query .= '';
     isset($devolucao) ? $query .= " datalocacao > '". $devolucao ."') OR (dataDevolucao is null AND dataLocacao is null) ) AND" : $query .= '';

     
     $modelo= DB::table('veiculos')
     ->select("veiculos.id AS idV", "modelo", "marca", "deleted_at", "ativo", "valor_aluguel")
     ->leftJoin('alugueis', 'alugueis.idVeiculo', '=', 'veiculos.id')
     ->whereRaw($query." deleted_at is null ")
     ->groupBy("idV", "modelo", "marca", "deleted_at", "ativo", "valor_aluguel")->get();

        return Response::json($modelo);

});

Route::get('/ajax-veiculo',function() {
     $cat_id = Input::get('cat_id');
     $modelo= DB::table('veiculos')->select('*')->where('id', '=',$cat_id)->where('deleted_at', '=', NULl)->get();
        return Response::json($modelo);

});

Route::get('/index/{id}', [
    'as' => 'alugeis.user',
    'uses' => 'AluguelController@indexUser'
  ]);


Route::get('/ativar/{id}', [
    'as' => 'clientes.active',
    'uses' => 'ClienteController@restore'
  ]);

Route::get('/ativarAluguel/{id}', [
    'as' => 'alugeis.active',
    'uses' => 'AluguelController@restore'
  ]);

Route::get('/ativarveiculo/{id}', [
    'as' => 'veiculos.active',
    'uses' => 'VeiculosController@restore'
  ]);

Route::get('/ativarfuncionario/{id}', [
    'as' => 'funcionarios.active',
    'uses' => 'funcionarioController@restore'
  ]);

Route::get('/devolucao/{id}', [
    'as' => 'aluguel.devolucao',
    'uses' => 'AluguelController@devolucao'
  ]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('search',array('as'=>'search', 'uses'=>'FuncionarioController@search'));
Route::get('search1',array('as'=>'autocomplete', 'uses'=>'FuncionarioController@autocomplete'));

Route::get('/home', 'HomeController@index');

Route::resource('funcionarios', 'FuncionarioController');
Route::resource('veiculos', 'VeiculosController');
Route::resource('alugeis', 'AluguelController');
Route::resource('clientes', 'ClienteController');

