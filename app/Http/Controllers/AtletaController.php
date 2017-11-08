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
   $categoria =Categoria::all(); 
   $clube=Clube::all(); 
   $escalao =Escalao::all();
   $treinador =Treinador::all();
   return view("atleta.create",['categoria'=>$categoria,'clube'=>$clube,'escalao'=>$escalao,'treinador'=>$treinador]);
 }   

 public function edit($id)
 { 
  $atleta= Atleta::find($id);
  return view('atleta.edit',compact('atleta','id'));
} 

public function update(Request $request, $id)
{ 
 request()->validate(  
  [   
   'nome' => 'required|unique:atletas|min:3,max:40',    
 ]); 
 Atleta::find($id)->update($request->all());
 return redirect()->route('atleta.index')

 ->with('success','Atleta actualizado com sucesso'); 
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
     'nome' => 'required|unique:atletas|min:3,max:40', 
   ]);
 }

 $atleta = new atleta([
  'nome' => $request->get('nome'),
  'apelido' => $request->get('apelido'),
  'cinturao' => $request->get('cinturao'), 
  'clube' => $request->get('clube'), 
  'categoria' => $request->get('categoria'), 
  'escalao' => $request->get('escalao'), 
  'peso' => $request->get('peso'), 
  'sexo' => $request->get('sexo'),  
  'idade' => $request->get('idade'),  
  'telefone' => $request->get('telefone'), 
  'email' => $request->get('email'), 
  'treinador' => $request->get('treinador'), 
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


public function destroy($id)
{
  $atleta = Atleta::find($id);
  $atleta->delete();

  return redirect('atleta');
} 

} 