<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/articles', [AccueilController::class, 'articles'])->name('articles');
// Route::get('/competitions', [AccueilController::class, 'competitions'])->name('competitions');
Route::get('/inscription', [AccueilController::class, 'inscription'])->name('inscription');

Route::get('/creerArticle', function () { 
    return view('creerArticle');
})->name('creerArticle');

Route::get('/competitions', function () { 
    return view('competitions');
})->name('competitions');

Route::post('/creerArticle', [AccueilController::class, 'CreerArticle'])->name('creerArticle');
// Route::get('/creerArticle', [AccueilController::class, 'CreerArticle'])->name('creerArticle');

Route::get('/creerCompetition', function () { 
    return view('creerCompetition');
})->name('creerCompetition');

Route::get('/creerExercice', function () { 
    return view('creerExercice');
})->name('creerExercice');

// Route::get('/modifArticle/{id}', function () { 
//     return view('modifArticle');
// })->name('modifArticle');
Route::get('/affModifArticle/{id?}', [AccueilController::class, 'affModifArticle',])->name('affModifArticle');

Route::post('/modifArticle/{id?}', [AccueilController::class, 'modifArticle'])->name('modifArticle');


Route::get('/supArticle/{id}', [AccueilController::class, 'supArticle',])->name('supArticle');

Route::get('/affArticle/{id}', [AccueilController::class, 'affArticle',])->name('affArticle');
Route::get('/affCompet/{id}', [AccueilController::class, 'affCompet',])->name('affCompet');


Route::post('/creerCompetition', [AccueilController::class, 'creerCompetition'])->name('creerCompetition');


Route::post('/creerExercice', [AccueilController::class, 'CreerExercice'])->name('CreerExercice');
Route::get('/affExercice/{id?}', [AccueilController::class, 'affExercice',])->name('affExercice');
Route::get('/exoStart/{id?}', [AccueilController::class, 'exoStart',])->name('exoStart');


//La route pour afficher les entrainements
Route::get('/affichEntrainement/{id?}', [AccueilController::class, 'affichEntrainement'])->name('affichEntrainement');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
