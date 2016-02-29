<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->get('/', ['as'=>'agenda.index','uses'=>'AgendaController@index']);
$app->get('/{letra}', ['as'=>'agenda.letra','uses'=>'AgendaController@index']); 
$app->post('/search', ['as'=>'agenda.search','uses'=>'AgendaController@search']);
$app->get('pessoa/{id}', ['as'=>'pessoa.destroy','uses'=>'AgendaController@destroy']);
$app->get('telefone/{id}', ['as'=>'telefone.destroy','uses'=>'TelefoneController@destroy']);

