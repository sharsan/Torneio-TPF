<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;  
use App\Atleta;
use App\Categoria;  
use App\Clube;     
use App\Escalao;   
use App\Treinador;   

class AtletaController extends Controller
{   

   public function index()
       {
        $atleta = Atleta::all()->toArray(); 
        return view('atleta.index', compact('atleta'));
       } 

            public function create()
       {              
             $atleta =Atleta::all();  
             $categoria_id =Categoria::all(); 
             $clube_id =Clube::all(); 
             $escalao_id =Escalao::all();
             $treinador_id =Treinador::all();
           return view("atleta.create",['categoria'=>$categoria,'clube_id'=>$clube_id,'escalao_id'=>$escalao_id,'treinador_id'=>$treinador_id]);
       }   

    public function edit($id)
       { 
        $atleta= Atleta::find($id);
        return view('atleta.edit',compact('atleta','id'));
       } 

    public function store(Request $request)
    {      
           $existe=$request->get('idade')!="";

                   if($existe==true){
                           $this->validate(request(), [
              'idade'=> 'numeric|min:3|max:90',  
                                                      ]);
                                    }
                   else{  

             $this->validate(request(), [
               'nome' => 'required|unique:atletas|max:40', 
                                        ]);
             }

        $atleta = new atleta([
          'nome' => $request->get('nome'),
          'apelido' => $request->get('apelido'),
          'cinturao' => $request->get('cinturao'), 
          'clube_id' => $request->get('clube_id'), 
          'categoria_id' => $request->get('categoria_id'), 
          'escalao' => $request->get('escalao_id'), 
          'peso' => $request->get('peso'), 
          'sexo' => $request->get('sexo'),  
          'idade' => $request->get('idade'),  
          'telefone' => $request->get('telefone'), 
          'email' => $request->get('email'), 
          'treinador_id' => $request->get('treinador_id'), 
          'descricao' => $request->get('descricao') 
          //campos de exigencia de valores
        ]);

           Atleta::create($request->all());
             return back()->with('success', 'Atleta adicionado com sucesso');
 
        // return redirect('/atleta');
        }  

    public function show($id) 
    { 
          $atleta = Atleta::find($id);

            return view('atleta.show',compact('atleta')); 
        } 
        
      public function update(Request $request, $id)
    {
        $atleta = Atleta::find($id);
        
        $this->validate(request(), [         
          'nome' => 'required'  
          // 'nome' => 'required|unique:posts|max:15' 
          //NAO FUNCIONA PORCAUSA DO UNIQUE NO EDIT
            ]);
        $atleta->nome = $request->get('nome');
             // $table->string('email')/*->unique()*/; 
        $atleta->apelido = $request->get('apelido');
        $atleta->cinturao = $request->get('cinturao');
        $atleta->clube_id = $request->get('clube_id');
        $atleta->categoria_id = $request->get('categoria_id');
        $atleta->escalao_id = $request->get('escalao_id');
        $atleta->peso = $request->get('peso');
        $atleta->sexo = $request->get('sexo');
        $atleta->idade = $request->get('idade');
        $atleta->telefone = $request->get('telefone');
        $atleta->email = $request->get('email');
        $atleta->treinador_id = $request->get('treinador_id');
        $atleta->descricao = $request->get('descricao');
        $atleta->save();
        return redirect('/atleta')->with('success','Arbitro actualizado com sucesso');
    }

    public function destroy($id)
    {
      $atleta = Atleta::find($id);
      $atleta->delete();

      return redirect('atleta');
    } 

} 