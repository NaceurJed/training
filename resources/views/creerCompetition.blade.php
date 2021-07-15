@extends('layouts.app')

@section('content')

@if(isset($competition))
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    La compétition " {{ $competition->nom }} " a bien été crée.
  </div>
</div>
@endif

<h2 class="text-center pt-5 ">Création de compétition</h2>
<hr id="ligne" class="mb-5">
<div class="row">
<form class="col-6 offset-3" method="post" action="{{ route('creerCompetition')}}" enctype="multipart/form-data">
	@csrf
	<div class="mb-3">
		<label for="nom" class="form-label">Nom compétition</label>
		<input type="text" class="form-control" name="nom" id="nom" placeholder="Titre de l'article">
	</div>
	<div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea name="description" class="form-control" id="description" rows="3" placeholder="Description de la compétition"></textarea>
	</div>
	<div class="mb-3">
		<label for="date" class="form-label">Date de la compétition</label>
		<input type="date" class="form-control" name="date" id="date" placeholder="Date de la compétition">
	</div>
	<label for="image">Choisir l'affiche de la compétition</label>
	<input type="file" id="image" name="image" class="mb-3">
	<div class="text-center mb-5">
		<button type="submit" class="btn btn-dark">Créer</button>
	</div>
</form>
</div>

@endsection