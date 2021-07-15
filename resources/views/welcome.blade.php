@extends('layouts.app')

@section('content')

	{{-- @if($posts->count() > 0)	
		@foreach($articles as $article)
			<h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3> 
		@endforeach
	@else
		<span>Aucun post en base de donnée</span>
	@endif --}}
 @if(isset($pseudo))
 	<div>{{ $pseudo }}</div>
 @endif

{{-- LES ARTICLES --}}
<article class="row">
	@foreach($articles as $article)
		<div class="card col-4">
		  	<img src="{{ $article->image }}" class="card-img-top" alt="Footing">
		  	<div class="card-body">
		    	<h5 class="card-title">{{ $article->titre }}</h5>
		    	<p class="card-text">{{ substr($article->contenu, 0, 60)."..." }}</p>
		    	<div class="text-center mb-3">
		    		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
					  Lire ...
					</button>
		    	</div>
		    	<p>Publié le {{ $article->created_at->format('d-m-Y') }} à {{ $article->created_at->format('H:i') }}</p>
		    	
		  	</div>
		</div>
	@endforeach
</article>

@endsection