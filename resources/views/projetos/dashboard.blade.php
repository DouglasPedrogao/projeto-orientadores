@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Projetos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Projetos as $Projetos)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/projetos/{{ $Projetos->id }}">{{ $Projetos->name}}</a></td>
                    <td>0</td>
                    <td><a href="/projetos/edit/{{$Projetos->id}}" class="btn btn-primary">Editar</a> 
                        <form action="/projetos/{{$Projetos->id}}" method ="POST">
                            @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                  </form>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem projetos, <a href="/projetos/create">criar projeto</a></p>
    @endif
</div>
@endsection
