<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
      public function index()
         {
             $categoria_id = Categoria::all()->toArray();
        
             return view('categoria.index', compact('categoria_id'));
         }
 
      public function create()
         {
             return view("categoria.create",compact('categoria_id')); 
         } 
    
         public function edit($id)
         {
             $categoria_id = Categoria::find($id);
        
             return view('categoria.edit', compact('categoria_id','id')); 
         } 

         public function store(Request $request)
         {     
           $this->validate(request(), [
        'nome' => 'required|unique:categorias|max:40',
            ]);
            $categoria_id = new Categoria([
                'nome' => $request->get('nome'),  
                'descricao' => $request->get('descricao')
               //campos de exigencia de valores
                              ]);
      Categoria::create($request->all());
            return back()->with('success', 'Categoria adicionado com sucesso'); 
 
         }
 
        public function update(Request $request, $id)
         {      
           request()->validate(  
          [   
                  'nome' => 'required' 
          ]); 
          Categoria::find($id)->update($request->all());
           return redirect()->route('categoria.index')

                        ->with('success','Categoria actualizada com sucesso');  
         }
 
         public function destroy($id)
        {
           $categoria_id = Categoria::find($id);
           $categoria_id->delete();

           return redirect('/categoria');
      }  
}
