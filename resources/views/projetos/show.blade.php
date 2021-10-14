@extends('layouts.main')

@section('title', $Projeto->name)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/projects/{{ $Projeto->image }}" class="img-fluid" alt="{{ $Projeto->name }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $Projeto->name }}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $Projeto->campus }}</p>
        <p class="events-participants"><ion-icon name="people-outline"></ion-icon> X Alunos</p>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Orientador: {{ $ProjectOwner['name'] }}</p>
        <form action="/events/join/{{ $Projeto->id }}" method="POST">
          @csrf
          <a href="/projetos/join/{{ $Projeto->id }}" 
            class="btn btn-primary" 
            id="event-submit"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            Confirmar Presença
          </a>
        </form>
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o projeto:</h3>
        <p class="event-description">{{ $Projeto->description }}</p>
      </div>
    </div>
  </div>
@endsection