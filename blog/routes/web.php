<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\commentaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index']);


Route::get('/categories', [CategorieController::class, 'categories']);
Route::get('/ajouterCategorie', [CategorieController::class, 'ajouter']);
Route::post('/categorie/ajouter', [CategorieController::class, 'store']);

Route::get('/categorie/modifier/{id}', [CategorieController::class, 'modifier']);
Route::patch('/categorie/modifier/{id}/edit', [CategorieController::class, 'update']);
Route::delete('/categorie/supprimer/{id}', [CategorieController::class, "destroy"]);

Route::get('/ajouterArticle', [ArticleController::class, 'ajouter']);
Route::post('/articles/ajouter', [ArticleController::class, 'store']);
Route::get('/article/{id}', [ArticleController::class, 'show']);
Route::get('/article/modifier/{id}', [ArticleController::class, 'modifier']);
Route::patch('/article/modifier/{id}/edit', [ArticleController::class, 'update']);
Route::delete('/article/supprimer/{id}', [ArticleController::class, "destroy"]);

Route::post('/ajouterCommentaire', [commentaireController::class, 'store']);
Route::get('/commentaire/modifier/{id}', [commentaireController::class, 'modifier']);
Route::patch('/commentaire/modifier/{id}/edit', [commentaireController::class, 'update']);
Route::delete('/commentaire/supprimer/{id}', [commentaireController::class, "destroy"]);
