<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projeto;
use App\Models\User;

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
        
            $requestImage->move(public_path('img/projects'), $imageName);

            $Projeto->image = $imageName;
        }
        $user = auth()->user();
        $Projeto->user_id = $user->id;
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
    public function show($id){
        $Projeto = Projeto::findOrFail($id);
        $ProjectOwner = User::where('id', $Projeto->user_id)->first()->toArray();

        return view('projetos.show',['Projeto'=>$Projeto, 'ProjectOwner' => $ProjectOwner]);
    }

    public function dashboard(){
        $user = auth()->user();
        $Projeto = $user->projetos;

        return view('projetos.dashboard',['Projetos'=> $Projeto]);
    }

    public function joinProject($id){
        $user = auth()->user();

        $user->projetosAsParticipant()->attach($id);

        $Projeto = Projeto::findOrFail($id);

        return redirect('/dashboard')->with('msg','Sua solicitação foi enviada para o projeto:'. $Projeto->name);

    }
}
