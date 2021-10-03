
@extends('layouts.main')

@section('title', 'Orientadores')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Encontre um orientador</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Orientadores disponíveis</h2>
    <p class="subtitle">Veja os orientadores que estão disponíveis</p>
    <div id="cards-container" class="row">
        @foreach($Projeto as $Projeto)
        <div class="card col-md-3">
            <img src="/img/event_placeholder.jpg" alt="{{ $Projeto->name }}">
            <div class="card-body">
                <p class="card-date">10/09/2020</p>
                <h5 class="card-title">{{ $Projeto->name }}</h5>
                <p class="card-participants">X Participantes</p>
                <a href="/projetos/edit/{{$Projeto->id}}" class="btn btn-primary">Editar</a>
                <form action="/projetos/{{$Projeto->id}}" method ="POST">
                  @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection