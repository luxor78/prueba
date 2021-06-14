<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Paciente::all();
        return view('pages.pacientes.index')->with('pacientes',$data);
    }
    public function create()
    {
        return view('pages.pacientes.create');
    }
    public function store(Request $request)
    {
        try{
            $id = Paciente::create($request->all())->id;
            return redirect('/pacientes');
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function show(Paciente $paciente)
    {
        //
    }
    public function edit($id)
    {
        $data = Paciente::find($id);
        return view('pages.pacientes.edit')->with('paciente',$data);
    }
    public function update(Request $request, $id)
    {
        try{
            Paciente::where("id",$id)->update([
                'tipo_documento'=>$request->tipo_documento,
                'doi'=>$request->doi,
                'nombre'=>$request->nombre,
                'fecha_nacimiento'=>$request->fecha_nacimiento,
                'email'=>$request->email,
                'celular'=>$request->celular
            ]);
            return redirect('/pacientes');
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Paciente::find($id);

            if(!$item){
                return response()->json(['Item no existe'],404);
            }
            $item->delete();
            return redirect('/pacientes');
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
}
