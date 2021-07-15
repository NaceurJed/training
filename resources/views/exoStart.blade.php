@extends('layouts.app')

@section('content')

<h2 id="titre" class="text-center pt-2 mt-4">Début de l'exercice {{ $exercice->nom }}</h2>
<hr id="ligne" class="mb-5">

<div class="row">
	<form class="col-8 offset-2" method="post" action="{{ route('creerExercice')}}">
		@csrf
		<table class="table table-dark table-bordered border-light">
		  <thead>
		    <tr>
		      <th scope="col">Séries</th>
		      <th scope="col"><input class="text-center" type="number" name="serie1" value="1" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie2" value="2" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie3" value="3" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie4" value="4" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie5" value="5" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie6" value="6" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie7" value="7" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie8" value="8" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie9" value="9" readonly></th>
		      <th scope="col"><input class="text-center" type="number" name="serie10" value="10" readonly></th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">Répétition/série</th>
		      <td><input class="text-center" type="number" name="repetSerie1"></td>
		      <td><input class="text-center" type="number" name="repetSerie2"></td>
		      <td><input class="text-center" type="number" name="repetSerie3"></td>
		      <td><input class="text-center" type="number" name="repetSerie4"></td>
		      <td><input class="text-center" type="number" name="repetSerie5"></td>
		      <td><input class="text-center" type="number" name="repetSerie6"></td>
		      <td><input class="text-center" type="number" name="repetSerie7"></td>
		      <td><input class="text-center" type="number" name="repetSerie8"></td>
		      <td><input class="text-center" type="number" name="repetSerie9"></td>
		      <td><input class="text-center" type="number" name="repetSerie10"></td>
		    </tr>
		    <tr>
		      <th scope="row">Temps/série</th>
		      <td><input class="text-center" type="number" name="tempSerie1"></td>
		      <td><input class="text-center" type="number" name="tempSerie2"></td>
		      <td><input class="text-center" type="number" name="tempSerie3"></td>
		      <td><input class="text-center" type="number" name="tempSerie4"></td>
		      <td><input class="text-center" type="number" name="tempSerie5"></td>
		      <td><input class="text-center" type="number" name="tempSerie6"></td>
		      <td><input class="text-center" type="number" name="tempSerie7"></td>
		      <td><input class="text-center" type="number" name="tempSerie8"></td>
		      <td><input class="text-center" type="number" name="tempSerie9"></td>
		      <td><input class="text-center" type="number" name="tempSerie10"></td>
		    </tr>
		    <tr>
		      <th scope="row">Repos/série</th>
		      <td><input class="text-center" type="number" name="repoSerie1"></td>
		      <td><input class="text-center" type="number" name="repoSerie2"></td>
		      <td><input class="text-center" type="number" name="repoSerie3"></td>
		      <td><input class="text-center" type="number" name="repoSerie4"></td>
		      <td><input class="text-center" type="number" name="repoSerie5"></td>
		      <td><input class="text-center" type="number" name="repoSerie6"></td>
		      <td><input class="text-center" type="number" name="repoSerie7"></td>
		      <td><input class="text-center" type="number" name="repoSerie8"></td>
		      <td><input class="text-center" type="number" name="repoSerie9"></td>
		      <td><input class="text-center" type="number" name="repoSerie10"></td>
		      {{-- <td><input type="number" name="repoSerie1"></td> --}}
		    </tr>
		    <tr>
		      <th scope="row">Valider *</th>
		      <td><input type="submit" name="repoSerie1" value="valider" name="valideSerie1"></td>
		      <td><input type="submit" name="repoSerie2" value="valider" name="valideSerie2"></td>
		      <td><input type="submit" name="repoSerie3" value="valider" name="valideSerie3"></td>
		      <td><input type="submit" name="repoSerie4" value="valider" name="valideSerie4"></td>
		      <td><input type="submit" name="repoSerie5" value="valider" name="valideSerie5"></td>
		      <td><input type="submit" name="repoSerie6" value="valider" name="valideSerie6"></td>
		      <td><input type="submit" name="repoSerie7" value="valider" name="valideSerie7"></td>
		      <td><input type="submit" name="repoSerie8" value="valider" name="valideSerie8"></td>
		      <td><input type="submit" name="repoSerie9" value="valider" name="valideSerie9"></td>
		      <td><input type="submit" name="repoSerie9" value="valider" name="valideSerie10"></td>
		      {{-- <td><input type="number" name="repoSerie1"></td> --}}
		    </tr>
		  </tbody>
		</table>
	</form>
	
	<h2 class="col-8 offset-2">Instructions</h2>
	<p class="col-8 offset-2">{!! nl2br(e($exercice->contenu)) !!}</p>
	<i class="col-8 offset-2 mb-5">* Validez chaque série avant de passer à la suivante</i>
</div>

@endsection