<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contacto;
class ContactoController extends Controller
{
    
    public function index()
    {
        //
        $contactos = Contacto::orderBy('id','DESC')->paginate(3);
        return view('Contacto.index',compact('contactos')); 
    }
    
    public function create()
    {
        //
        return view('Contacto.create');
    }
    
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'telefono'=>'required']);
        Contacto::create($request->all());
        return redirect()->route('contacto.index')->with('success','Registro creado satisfactoriamente');
    }
   
    public function show($id)
    {
        $contactos=Contacto::find($id);
        return  view('contacto.show',compact('contacto'));
    }
    
    public function edit($id)
    {
        //
        $contactos=contacto::find($id);
        return view('contacto.edit',compact('contacto'));
    }

    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'telefono'=>'required']);

        contacto::find($id)->update($request->all());
        return redirect()->route('contacto.index')->with('success','Registro actualizado satisfactoriamente');

    }
  
    public function destroy($id)
    {
        //
        Contacto::find($id)->delete();
        return redirect()->route('contacto.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
