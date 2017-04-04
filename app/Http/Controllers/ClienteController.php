<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Cliente;
use Redirect;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminRequestEdit;
use App\User;

class ClienteController extends Controller
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
         //$Clientes2= DB::table('users')->select('*')->where('perfil', '=', $cat_id)->where('deleted_at', '=', NULl)->get();
         $clientes = DB::table('users')->where('perfil', '=', 'user')->paginate(10);
         
         

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
public function limpar($entrada)
    {
        $entrada = trim($entrada);
        $entrada = str_replace(".", "", $entrada);
        $entrada = str_replace("(", "", $entrada);
        $entrada = str_replace(")", "", $entrada);
        $entrada = str_replace("-", "", $entrada);
        $entrada = str_replace(" ", "", $entrada);
        return $entrada;
    }
    public function store(AdminRequest $request)
    {
        die("asdsa");
        $Cliente = new User;
        $Cliente->name = $request->name;
        $Cliente->email = $request->email;
        $Cliente->cpf = $this->limpar($request->cpf);
        $Cliente->password = bcrypt($request->password );
        $Cliente->endereco = $request->endereco;
        $Cliente->telefone = $this->limpar($request->telefone);
        $Cliente->perfil = $request->perfil;
        $Cliente->save();     
        return redirect()->route('clientes.create')->with('status', 'Funcionário Cadastrado com Sucesso!');        
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
        $Clientes = User::find($id);
            if (is_null($Clientes)){
                ?>
                <script>alert('Usuário Está Desabilitado')</script>
                <?php

                return Redirect::route('clientes.index');
            }

            return view('clientes.edit', compact('Clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequestEdit $request, $id)
    {
          $Cliente = User::find($id);
   

            $Cliente->name = $request->name;
            $Cliente->email = $request->email;
            $Cliente->cpf = $this->limpar($request->cpf);
            $Cliente->endereco = $request->endereco;
            $Cliente->telefone = $this->limpar($request->telefone);
            $Cliente->save();

            return redirect('home')->with('clienteAt', 'Cliente Atualizado com Sucesso!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $cliente=User::find($id);
            if (is_null($cliente)){
               echo "Cliente Invalido";
               return Redirect::route('clientes.index')->with('Cliente , já esta inativo');
           }

           User::find($id)->delete();

           return redirect()->route('clientes.index')->with('sucesso, Cliente deletado com sucesso');


    }

       public function restore($id)
       {

         User::onlyTrashed()
         ->where('id', $id)
         ->restore();
         return redirect()->route('clientes.index');



     }

}
