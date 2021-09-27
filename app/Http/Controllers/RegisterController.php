<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register;

class RegisterController extends Controller
{
    public function index(){
        $register = Register::all();
        return view('welcome', ['register' => $register ]);
    }

    public function create(){
        return view('registers.create');
    }

    public function store(Request $request){
        
        $register = new Register;
        
        $register->name = $request->name;
        $register->campus = $request->campus;
        $register->disponibility = $request->disponibility;
        $register->description = $request->description;

        $register->save();

        return redirect('/');
    }
    public function destroy($id){

        Register::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){
        $register = Register::findOrFail($id);

        return view('registers.edit',['register'=> $register]);
    }

    public function update(Request $request){

        Register::findOrFail($request->id)->update($request->all());
        return redirect('/')->with('msg', 'Evento editado com sucesso!');
    }
}
