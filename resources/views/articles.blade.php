@extends('layouts.app')

@section('content')
{{-- LES ARTICLES --}}
<article class="row">
	<h1 class="text-center p-3 mt-5 text-light">Bibliothèque</h1>
	<hr id="ligne">

	@if(isset($sup))
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
		    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
		  </symbol>
		</svg>
		<div class="alert alert-success d-flex align-items-center" role="alert">
		  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		  <div>
		    Votre article "{{ $articleSup->titre }}" a bien été supprimé.
		  </div>
		</div>
	@endif

	@foreach($articles as $article)
		<div class="card m-5 col-10 offset-1 shadow-lg">
		  <div class="row g-0">
		    <div class="col-md-4">
		      <img src="{{ asset('Storage/'.$article->image) }}" class="img-fluid rounded-start" alt="...">
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title">{{ $article->titre }}</h5>
		        <p class="card-text">{{ substr($article->contenu, 0, 60)."..." }}</p>
		        <p class="card-text"><small class="text-muted">Publié le {{ $article->created_at->format('d-m-Y') }} à {{ $article->created_at->format('H:i') }}</small></p>
		        <a href="{{ route('affArticle', ['id' => $article->id]) }}" class="btn btn-primary">Lire</a>
		        @auth
		    		<a href="{{ route('affModifArticle', ['id' => $article->id]) }}" class="btn btn-secondary">Modifier</a>
		    		<a href="{{ route('supArticle', ['id' => $article->id]) }}" class="btn btn-warning">Supprimer</a>
		    		@endauth
		      </div>
		    </div>
		  </div>
		</div>
	@endforeach
</article>

@endsection