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

$app->get('/', function () use ($app) {
    return $app->version();
});

// $app->group(['prefix' => 'auth']);


$app->group(['middleware' => 'auth'], function() use ($app){

	// /api/
	$app->group(['prefix' => 'api', 'as' => 'api'], function() use ($app){

		// /api/reporting/
		$app->group(['prefix' => 'reporting', 'as' => 'reporting'], function() use ($app){

			// /api/reporting/create/ - create new report
			$app->post('create', [
				'as' => 'create',
				'uses' => 'ReportingController@createNewReport', // Return ReportID
			]);
		});
	});
});

