<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Clube;

class ClubeController extends Controller
{
      public function index()
         {
             $clube_id = Clube::all()->toArray();
        
             return view('clube.index', compact('clube_id'));
         }
 
      public function create()
         {
             return view("clube.create",compact('clube_id')); 
         } 
    
         public function edit($id)
         {
             $clube_id = Clube::find($id);
        
             return view('clube.edit', compact('clube_id','id')); 
         } 

         public function store(Request $request)
         {     
           $this->validate(request(), [
        'nome' => 'required|unique:clubes|max:40',
            ]);
            $clube_id = new Clube([
                'nome' => $request->get('nome'),  
                'descricao' => $request->get('descricao')
               //campos de exigencia de valores
                              ]);
      Clube::create($request->all());
            return back()->with('success', 'Clube adicionado com sucesso'); 
 
         }
         
         public function update(Request $request, $id)
         {     
           request()->validate(  
          [   
                  'nome' => 'required' 
          ]); 
          Clube::find($id)->update($request->all());
           return redirect()->route('clube.index')

                        ->with('success','Categoria actualizada com sucesso');  
         }
 
         public function destroy($id)
        {
           $clube_id = Clube::find($id);
           $clube_id->delete();

           return redirect('/clube');
      }  
}
