@extends('layouts.app')

@section('content')

	<h1 class="text-center pt-4 mt-3">Entrainement</h1>
	<hr id="ligne" class="mb-5">
	<div class="row text-center">
		<h3 class="col-6">Selectionnez un muscle à travailler</h3>
		<h3 class="col-6">Exercices associés</h3>
		<hr>
	</div>

	<div class="row">
		{{-- Image du corps humain --}}
		<div class="col-6">
			<img src="{{ asset('image/muscles.jpg')}}" usemap="#corps" id="corps" usemap="#corps">
			<map name="corps" id="ImageMapsCom-image-maps-2021-07-07-094336">
				<area shape="rect" coords="798,798,800,800" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0"/>

				<area class="pec"  alt="Pectoraux" title="Pectoraux" href="{{ route('affichEntrainement', ['id' => 1]) }}" shape="poly" coords="138,200,150,180,169,170,187,166,204,174,210,180,222,166,241,167,262,174,277,187,283,201,274,215,260,229,238,231,210,217,179,232,162,233,148,217" style="outline:none;" target="_self"/>

				<area  alt="Abdominaux" title="Abdominaux" href="{{ route('affichEntrainement', ['id' => 10]) }}" shape="poly" coords="180,239,201,226,218,226,241,238,243,277,242,302,241,325,231,360,210,372,190,363,179,323,177,275" style="outline:none;" target="_self"/>

				<area  alt="Dorsaux" title="Dorsaux" href="{{ route('affichEntrainement', ['id' => 2]) }}" shape="poly" coords="620,174,633,168,650,181,650,194,658,200,647,250,638,271,618,312,614,327,608,328,598,296,593,267,621,229,626,206" style="outline:none;" target="_self"/>
				
				<area id="dorsaux" alt="Dorsaux" title="Dorsaux" href="{{ route('affichEntrainement', ['id' => 2]) }}" shape="poly" coords="528,180,545,169,556,171,558,180,551,206,554,220,567,246,584,266,581,290,573,322,568,328,562,326,553,298,539,271,527,236,521,200,527,192" style="outline:none;" target="_self"/>
			</map>
		</div>
	
		{{-- Exercice associé --}}
		<div class="col-4 offset-1">
			@if(isset($exercice))
				<div class="card" style="width: 35rem;">
				  <img src="{{ asset('Storage/'.$exercice->image) }}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title text-center">{{ $exercice->nom }}</h5>
				    <p class="card-text">{!! nl2br(e($exercice->contenu)) !!}</p>
				    <a href="{{ route('exoStart', ['id' => $exercice->id]) }}" class="btn btn-dark">Commencer</a>
				  </div> 
				</div>
			@endif
		</div>

	</div>

@endsection