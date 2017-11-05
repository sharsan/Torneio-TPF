<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Escalao;  

class EscalaoController extends Controller
{
        public function index()
         {
             $escalao_id = Escalao::all()->toArray();
        
             return view('escalao.index', compact('escalao_id'));
         }
 
         public function create()
         {
             return view("escalao.create",compact('escalao_id')); 
         } 
    
         public function edit($id)
         {
             $escalao_id = Escalao::find($id);
        
             return view('escalao.edit', compact('escalao_id','id')); 
         } 

         public function store(Request $request)
         {     
           $this->validate(request(), [
           'nome' => 'required|unique:escalaos|max:20',
            ]);
            $escalao_id = new Escalao([
                'nome' => $request->get('nome'), 
               //campos de exigencia de valores
                              ]);
            Escalao::create($request->all());
            return back()->with('success', 'Escalao adicionado com sucesso'); 
 
         }
 
         public function update(Request $request, $id)
         {          
           request()->validate(  
          [   
                  'nome' => 'required' 
          ]); 
          Escalao::find($id)->update($request->all());
           return redirect()->route('escalao.index')

                        ->with('success','Escalao actualizado com sucesso');   
         }
 
         public function destroy($id)
        {
           $escalao_id = Escalao::find($id);
           $escalao_id->delete();

           return redirect('/escalao');
      }  
}
