@extends('layouts.app')

@section('content')

<header class="mb-4">
	<br>
	<br>
	<h1 class="text-light text-center" id="texte">En forme physiquement<br>et mentalement<br>grâce à un coaching personnalisé</h1>
	<a id="commencez" class="btn btn-dark btn-outline-light" data-bs-toggle="modal" href="#exampleModalToggle" role="button" tabindex="-1" aria-disabled="true">Commencez-maintenant</a>
	{{-- <button href="#exampleModalToggle" id="commencez" type="button" class="btn btn-dark btn-outline-light">Commencez-maintenant</button> --}}
</header>


<main class="row mb-5">
	<h1 class="text-center">Les évenements à venir</h1>
	<hr id="ligne" class="mb-5">
	<div id="carouselExampleDark" class="shadow-lg carousel carousel-dark slide col-8 offset-2" data-bs-ride="carousel">
	  <div class="carousel-indicators">
	    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
	    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
	  </div>
	  <div class="carousel-inner">
	  	@php 
	  		$active = true; 
	  	@endphp;
		@foreach($competitions as $competition)
		    <div class="carousel-item @if($active) active @endif" data-bs-interval="5000">
		      <img src="{{ asset('Storage/'.$competition->image) }}" class="d-block w-100" alt="...">
		      <div id="detailEvent" class="carousel-caption d-none d-md-block text-light">
		        <h3>{{ $competition->nom }}</h3>
		        {{-- on converti la date avec une nouvelle instance de Datetime --}}
		        <h6>Rendez-vous le {{ (new Datetime($competition->date_compet))->format('d-m-Y') }}</h6>
		        {{-- <h5>{{ $competition->created_at->format('d-m-Y') }}</h5> --}}
		        {{-- <p>{{ $competition->description }}</p> --}}
		        <a href="{{ route('affCompet', ['id' => $competition->id]) }}" class="btn btn-outline-light">Info</a>
		      </div>
		    </div>
		  	@php $active = false; @endphp;
		@endforeach
		</div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Précedent</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Suivant</span>
	  </button>
	</div>
</main>
{{-- LES ARTICLES --}}
<article class="row">
	<div class="mb-5">
	<h1 class="text-center p-3 text-light">Enrichissez vos connaissances<br>grace à nos articles</h1>
	<hr id="ligne">
	</div>
	@foreach($articles as $article)
		<div class="card col-3 offset-1 mb-5 shadow-lg text-light" style="width: 22rem; background-color: black;">
		  	{{-- <img src="{{ $article->image }}" class="card-img-top" alt="Footing"> --}}
		  	<div id="blocImgArticle">
		  		<img src="{{ asset('Storage/'.$article->image) }}" id="imageCarte" class="card-img-top m-1 p-2" alt="Footing">
		  	</div>
		  	<div class="card-body">
		    	<h5 class="card-title text-center">{{ $article->titre }}</h5>
		    	<p class="card-text">{{ substr($article->contenu, 0, 60)."..." }}</p>
		    	<p><i>Publié le {{ $article->created_at->format('d-m-Y') }} à {{ $article->created_at->format('H:i') }}</i></p>
		    	<div class="mb-3 text-center">
					<a href="{{ route('affArticle', ['id' => $article->id]) }}" class="btn btn-outline-light">Lire</a>
		    	</div>
		    	
		  	</div>
		</div>
	@endforeach
</article>

@endsection