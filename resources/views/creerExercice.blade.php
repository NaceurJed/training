@extends('layouts.app')

@section('content')

@if(isset($exercice))
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
<div class="alert alert-success d-flex align-items-center m-0" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    L'exercice "{{ $exercice->nom }}" a bien été crée.
  </div>
</div>
@endif

<div class="row" id="creerExercice">
	<h1 class="pt-4 text-center">Création d'exercice</h1>
	<form method="post" action="{{ route('creerExercice')}}" enctype="multipart/form-data" class="col-6 offset-4">
		@csrf
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label h3">Exercice</label>
			<input type="text" class="form-control" name="nom" id="exampleFormControlInput1" placeholder="Nom de l'exercice">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label h3">Instruction</label>
			<textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="instruction de l'exercice"
			></textarea>
		</div>
		<label for="image">Choisir l'image de l'exercice</label>
		<input type="file" id="name" name="image">
		<br>
		<button type="submit" class="btn btn-dark">Créer</button>
	</form>
</div>

@endsection