<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projeto;

class ProjetoController extends Controller
{
    public function index(){
        $Projeto = Projeto::all();
        return view('welcome', ['Projeto' => $Projeto ]);
    }

    public function create(){
        return view('projetos.create');
    }

    public function store(Request $request){
        
        $Projeto = new Projeto;
        
        $Projeto->name = $request->name;
        $Projeto->campus = $request->campus;
        $Projeto->disponibility = $request->disponibility;
        $Projeto->description = $request->description;

        // Image Upload

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        
            $requestImage->move(public_path('img/events'), $imageName);

            $Projeto->image = $imageName;
        }

        $Projeto->save();

        return redirect('/')->with('msg', 'Projeto criado com sucesso!');
    }
    public function destroy($id){

        Projeto::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){
        $Projeto = Projeto::findOrFail($id);

        return view('projetos.edit',['Projeto'=> $Projeto]);
    }

    public function update(Request $request){

        Projeto::findOrFail($request->id)->update($request->all());
        return redirect('/')->with('msg', 'Evento editado com sucesso!');
    }
}
