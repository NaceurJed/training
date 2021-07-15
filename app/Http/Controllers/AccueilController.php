<?php

namespace App\Http\Controllers;
use App\Models\exercice;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\Competiteur;
use App\Models\Competition;
use App\Models\entrainement;
use App\Http\Requests\exerciceRequest; //pour utiliser la nouvelle régle pour l'image

use Illuminate\Support\Facades\Storage;

/**
 * 
 */
class AccueilController extends Controller
{
	
	public function index()
	{
		$articles = article::orderBy('created_at', 'desc')->take(3)->get();
		// dd($article);
		$competition = Competition::orderBy('date_compet', 'desc')->take(3)->get();
		// $compet = Competition::orderBy('date_compet')->take(3)->get();
		
		return view('accueil', [
			'articles' => $articles,
			'competitions' => $competition, 
			// 'compets' => $compet
		]);
	}

	public function articles()
	{
		$articles = article::orderBy('created_at', 'desc')->get();
		// $compet = Competition::orderBy('date_compet')->take(3)->get();

		return view('articles', [
			'articles' => $articles,
			// 'compets' => $compet
		]);
	}

	// public function competitions()
	// {
	// 	$competitions = Competition::orderBy('created_at', 'desc')->get();
	
	// 	return view('competitions', [
	// 		'competitions' => $competitions
	// 	]);
	// }

	public function CreerArticle(Request $request)
	{
		$request->validate([
		'titre' => 'required', //obligatoir|minimum 5 caractéres|...|unique dans la table posts
		'contenu' => 'required'
		]);

		$filename = time() . '.' . $request->image->extension();

		$path = $request->file('image')->storeAs(
			'images',
			$filename,
			'public'
		);
		
		$article = article::create([
			'titre' 	=> $request->titre,
			'contenu' 	=> $request->contenu,
			'image' 	=> $path
		 ]);

		$modifier = false;

		return view('creerArticle', [
			'article' => $article,
			'modifier' => $modifier
		]);

	}

	public function supArticle($id)
	{
		$articleSup = article::find($id); //on récupére le 12éme enregistrement
		
		$articleSup->delete();

		$sup = true;

		$articles = article::orderBy('created_at', 'desc')->get();
		// $compet = Competition::orderBy('date_compet')->take(3)->get();
		return view('articles', [
			'articleSup'=> $articleSup,
			'articles' 	=> $articles,
			// 'compets' 	=> $compet,
			'sup'		=> $sup
		]);
	}

	public function affArticle($id)
	{
		$article = article::find($id);
		return view('affArticle', [
			'article' 	=> $article
		]);

	}

	public function affCompet($id)
	{
		$competition = Competition::find($id);
		return view('affCompet', [
			'competition' 	=> $competition
		]);

	}

	public function affModifArticle($id)
	{
		$articleModif = article::find($id);
		//dd($articleModif);

		$articles = article::orderBy('created_at', 'desc')->get();
		// $compet = Competition::orderBy('date_compet')->take(3)->get();
		$modifier = false;
		return view('creerArticle', [
			'articleModif'=> $articleModif,
			'articles' 	=> $articles,
			'modifier' 	=> $modifier
		]);
	}

	public function modifArticle(Request $request, $id)
	{
		
		$request->validate([
		'titre' => 'required', //obligatoir|minimum 5 caractéres|...|unique dans la table posts
		'contenu' => 'required'
		]);

		if (isset($request->image)) {
			$filename = time() . '.' . $request->image->extension();
			$path = $request->file('image')->storeAs(
			'images',
			$filename,
			'public'
		);
		}

		$articleModif = article::find($id); //on récupére le 1er enregistrement
		$articleModif->update([
			'titre'=> $request->titre,
			'contenu'=> $request->contenu
		]);
		$modifier = true;

		return view('creerArticle', [
			'articleModif' => $articleModif,
			'modifier' => $modifier
		]);
		
	}


	public function creerCompetition(Request $request)
	{
		$request->validate([
		'nom' 			=> 'required', //obligatoir|minimum 5 caractéres|...|unique dans la table posts
		'description' 	=> 'required',
		'date' 			=> 'required',
		'image' 		=> 'required'
		]);
		$filename = time() . '.' . $request->image->extension();

		$path = $request->file('image')->storeAs(
			'imagesCompet',
			$filename,
			'public'
		);
		

		
		// dd($request->date);
		$competition = Competition::create([
			'nom' 			=> $request->nom,
			'description' 	=> $request->description,
			'date_compet' 	=> $request->date,
			'image' 		=> $path
		 ]);


		/********* Autre façon pour créer **********/
		// $competition = new Competition();
		// $competition->nom = $request->nom;
		// $competition->description = $request->description;
		// $competition->date_compet = $request->date;
		// $competition->image = $request->path;
		// $competition->save();
		/************************************************/
		// $compet = Competition::orderBy('date_compet')->take(3)->get();

		return view('creerCompetition', [
			'competition' => $competition,
			// 'compets' => $compet
		]);

		// $articles = article::orderBy('created_at', 'desc')->take(3)->get();
		// return view('accueil', [ //on retourne à la page 2 la valeur de $post qui va contenir un post spécifique selon l'id
		// 		'pseudo' => $request->pseudo,
		// 		'articles' => $articles 
		// 	]);
	}

	public function affichEntrainement($id=0)
	{
		if ($id != 0) {
			$exercice = exercice::find($id);
		
		return view('affichEntrainement', [
			'exercice'=> $exercice
		]);
		} else {
			return view('affichEntrainement');
		}
		
		
	}

	public function CreerExercice(exerciceRequest $request)
	{
		// La validate est traiter
		/*$request->validate([
		'nom' => 'required', //obligatoir|minimum 5 caractéres|...|unique dans la table posts
		'contenu' => 'required'
		]);*/

		$filename = time() . '.' . $request->image->extension();

		$path = $request->file('image')->storeAs(
			'imagesExercice',
			$filename,
			'public'
		);
		
		$exercice = exercice::create([
			'nom' 	=> $request->nom,
			'contenu' 	=> $request->contenu,
			'image' 	=> $path
		 ]);

		return view('creerExercice', [
			'exercice' => $exercice
		]);
	}

	public function affExercice($id)
	{
		$exercice = exercice::find($id);
		//dd($articleModif);
		
		return view('affichEntrainement', [
			'exercice'=> $exercice
		]);
	}

	public function exoStart($id)
	{
		$exercice = exercice::find($id);

		// dd($exercice);
		// $entrainement = entrainement::find($id);

		// foreach ($exercice->roles as $role) {
		//     echo $role->pivot->created_at;
		// }
		return view('exoStart', [
			'exercice'=> $exercice
		]);
	}

}

