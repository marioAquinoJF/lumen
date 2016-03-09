<?php


/*
 * Pessoas
 */
$app->get('contato/novo', ['as'=>'pessoa.create','uses'=>'PessoaController@create']);
$app->post('contato', ['as'=>'pessoa.store','uses'=>'PessoaController@store']);
$app->put('contato/{id}/atualizar', ['as'=>'pessoa.update','uses'=>'PessoaController@update']);
$app->get('contato/{id}/editar', ['as'=>'pessoa.edit','uses'=>'PessoaController@edit']);
$app->get('pessoa/{id}', ['as'=>'pessoa.delete','uses'=>'PessoaController@delete']);
$app->delete('pessoa/{id}', ['as'=>'pessoa.destroy','uses'=>'PessoaController@destroy']);
/*
 * Agenda
 */
$app->get('/', ['as'=>'agenda.index','uses'=>'AgendaController@index']);
$app->get('/{letra}', ['as'=>'agenda.letra','uses'=>'AgendaController@index']); 
$app->post('/search', ['as'=>'agenda.search','uses'=>'AgendaController@search']);
/*
 * Telefones
 */
$app->get('contato/{id}/telefone/novo', ['as'=>'telefone.create','uses'=>'TelefoneController@create']);
$app->post('contato/{id}/telefone', ['as'=>'telefone.store','uses'=>'TelefoneController@store']);
$app->get('contato/{id}/telefone/{telefoneId}/editar', ['as'=>'telefone.edit','uses'=>'TelefoneController@edit']);
$app->put('contato/{id}/telefone/{telefoneId}/atualizar', ['as'=>'telefone.update','uses'=>'TelefoneController@update']);
$app->get('contato/{id}/telefone/{telefoneId}', ['as'=>'telefone.delete','uses'=>'TelefoneController@delete']);
$app->delete('contato/{id}/telefone/{telefoneId}', ['as'=>'telefone.destroy','uses'=>'TelefoneController@destroy']);

/*
 * Emails
 */
$app->get('contato/{id}/email/novo', ['as'=>'email.create','uses'=>'EmailController@create']);
$app->post('contato/{id}/email', ['as'=>'email.store','uses'=>'EmailController@store']);
$app->get('contato/{id}/email/{emailId}/editar', ['as'=>'email.edit','uses'=>'EmailController@edit']);
$app->put('contato/{id}/email/{emailId}/atualizar', ['as'=>'email.update','uses'=>'EmailController@update']);
$app->get('contato/{id}/email/{emailId}', ['as'=>'email.delete','uses'=>'EmailController@delete']);
$app->delete('contato/{id}/email/{emailId}', ['as'=>'email.destroy','uses'=>'EmailController@destroy']);

