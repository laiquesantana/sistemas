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
*/


Route::get('/ajax-marca1',function() {
     $cat_id = Input::get('cat_id');
     $modelo= DB::table('veiculos')->select('modelo')->where('marca', '=', $cat_id)->where('deleted_at', '=', NULl)->get();

        return Response::json($modelo);

});


Route::get('/ativar/{id}', [
    'as' => 'clientes.active',
    'uses' => 'ClienteController@restore'
  ]);

Route::get('/ativarveiculo/{id}', [
    'as' => 'veiculos.active',
    'uses' => 'VeiculosController@restore'
  ]);

Route::get('/ativarfuncionario/{id}', [
    'as' => 'funcionarios.active',
    'uses' => 'funcionarioController@restore'
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

