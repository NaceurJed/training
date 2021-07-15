@extends('layouts.app')

@section('content')

@if(isset($article))
<br>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
<div class="alert alert-success d-flex align-items-center " role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Votre article "{{ $article->titre }}" a bien été crée.
  </div>
</div>

@elseif(isset($modifier) && ($modifier == true))
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Voter article "{{ $articleModif->titre }}" a bien été modifié.
  </div>
</div>

@endif

@if(isset($articleModif))

<h2 class="text-center pt-5 ">Modification d'article</h2>
<div class="row">
	<form class="col-6 offset-3" method="post" action="{{ route('modifArticle', $id = $articleModif->id) }}" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Titre</label>
			<input type="text" class="form-control" name="titre" id="exampleFormControlInput1" placeholder="Titre de l'article"
			value="{{ $articleModif->titre }}">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Texte</label>
			<textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Contenu de l'article"
			>{{ $articleModif->contenu }}</textarea>
		</div>
		<label for="image">Choisir l'image de l'article</label>
		<input type="file" id="name" name="image" class="mb-3">
		<br>
		<div class="text-center mb-5">
		<button type="submit" class="btn btn-dark" id="modifier" name="modif">Modifier</button>
		</div>
	</form>
</div>

@else

<h2 class="text-center pt-5 ">Création d'article</h2>
<div class="row">
	<form class="col-6 offset-3" method="post" action="{{ route('creerArticle')}}" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Titre</label>
			<input type="text" class="form-control" name="titre" id="exampleFormControlInput1" placeholder="Titre de l'article">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Texte</label>
			<textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Contenu de l'article"
			></textarea>
		</div>
		<label for="image">Choisir l'image de l'article</label>
		<input type="file" id="name" name="image" class="mb-3">
		<div class="text-center mb-5">
		<button type="submit" class="btn btn-dark">Publier</button>
		</div>
	</form>
</div>

@endif
@endsection