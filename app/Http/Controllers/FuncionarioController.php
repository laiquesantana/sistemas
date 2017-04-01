<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use DB;
use View;
use App\User;
use Redirect;
class FuncionarioController extends Controller
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
         $users = DB::table('users')->paginate(5);
         //dd($users);

        return View::make('funcionarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function autocomplete(Request $request){
        $term=$request->term;
        $data= User::where('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results=array();
        foreach ($data as $key => $value) {
            $results[]=['id'=>$value->id,'value'=>$value->name];
        }
        return Response()->json($results);
    }

   public function search(Request $request){
        if($request->ajax()){
            $term=$request->search;
            $users= DB::table('users')->where('name','LIKE','%'.$term.'%')->paginate(5);
            return View::make('funcionarios.search', compact('users'));

        }
    }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $users = User::find($id);
            if (is_null($users)){
                ?>
                <script>alert('Usuário Está Desabilitado')</script>
                <?php

                return Redirect::route('funcionarios.index');
            }


            return view('funcionarios.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $users = User::find($id);
         //dd($users);

            $users->name = $request->name;
            if(!empty($request->password)){
                $users->password = bcrypt($request->password);
            }
            $users->email = $request->email;
            $users->perfil = $request->perfil;
            $users->save();

            return Redirect::route('funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
