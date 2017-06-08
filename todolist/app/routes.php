<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/********** HOME *************/ 
Route::get('/', function()
{
	return View::make('index');
});


Route::get('list_task', function(){

	return View::make('list_task')->with('entry', 0)->with('modify', null);

});

Route::post('list_task', function(){

	$inputs = Input::except('_token');
	$action = $_POST['action'];
	if($action == 'Supprimer'){
		$task = Task::find($inputs['id']);
		$task->delete();
		return View::make('list_task')->with('entry', 0)->with('modify', null);
	}
	elseif($action == 'Une tache ?')
	{
		return View::make('list_task')->with('entry', array_values($inputs)[0])->with('modify', null);
	}
	elseif($action == 'Modifier')
	{
		return View::make('list_task')->with('entry', 0)->with('modify', $inputs['id']);
	}
	elseif($action == 'Créer'){
		$inputs = Input::except('_token', 'number', 'action');
		$task = new Task;
		foreach($inputs as $key=>$value){
			$task->$key = $value;
		}
		$task->save();
		return View::make('list_task')->with('entry', 0)->with('modify', null);
	}
	elseif($action == 'Sauvegarder'){
		$task = Task::find($inputs['id']);
		$inputs = Input::except('_token', 'number', 'action', 'id');
		foreach($inputs as $key=>$value){
			$task->$key = $value;
		}
		$task->save();
		return View::make('list_task')->with('entry', 0)->with('modify', null);
	}
	

});



/********** 404 *************/ 
App::missing(function($exception){
    return Response::make('Page Introuvable', 404);
});