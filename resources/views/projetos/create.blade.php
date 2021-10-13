
@extends('layouts.main')

@section('title', 'Cadastre seu projeto')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre seu projeto </h1>
  <form action="/projetos" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
      <label for="image">Projeto:</label>
      <input type="file" id="image" name="image" class="form-control-file">
    </div>
    <div class="form-group">
      <label for="title">Nome:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do orientador">
    </div>
    <div class="form-group">
      <label for="title">Campus</label>
      <input type="text" class="form-control" id="campus" name="campus" placeholder="Seu campus">
    </div>
    <div class="form-group">
      <label for="title">Está disponível para orientação?</label>
      <select name="disponibility" id="disponibility" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="title">Descreva suas habilidades:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Suas habilidades"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Evento">
  </form>
</div>

@endsection