<?php
use App\Facture;

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
//Route::get('/', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

Route::resource('compteur', 'CompteurController');
Route::resource('abonnement', 'abonnementController');
Route::resource('facture', 'factureController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('getfacture/{id}',function (){
   $id = request('id');
   $item =  Facture::find($id);
   header("Acces-Control-Allow-Origin: *");
   return response()->json($item);
});