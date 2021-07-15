@extends('layouts.app')

@section('content')
{{-- Les Evénements --}}
<div class="row">
	<h1 class="text-center p-3 mt-5 text-dark">Tous les événements</h1>
	<hr id="ligne">
@foreach($compets as $compet)
		<div class="card m-5 col-10 offset-1 shadow-lg">
		  <div class="row g-0">
		    <div class="col-md-4">
		      <img src="{{ asset('Storage/'.$compet->image) }}" class="img-fluid rounded-start" alt="...">
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title">{{ $compet->nom }}</h5>
		        <p class="card-text">{{ substr($compet->description, 0, 60)."..." }}</p>
		        <p class="card-text"><small class="text-muted">Publié le {{ $compet->created_at->format('d-m-Y') }} </small></p>
		        <a href="{{ route('affCompet', ['id' => $compet->id]) }}" class="btn btn-primary">Lire</a>
		        {{-- @auth
		    		<a href="{{ route('affModifArticle', ['id' => $article->id]) }}" class="btn btn-secondary">Modifier</a>
		    		<a href="{{ route('supArticle', ['id' => $article->id]) }}" class="btn btn-warning">Supprimer</a>
		    	@endauth --}}
		      </div>
		    </div>
		  </div>
		</div>
	@endforeach
</div>

@endsection