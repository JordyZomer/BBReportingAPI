<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;


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

// Login to app
$app->post('login/auth', ['as' => 'login.auth', function(Request $request){
	$username = $request->input('username');
	$password = $request->input('password');

	$user = User::where('username', $username)->first();

	$apiToken = '';
	
	if(Hash::check($password, $user->password)) {
		$apiToken = $user->api_token;
	}

	return response([
		'api_token' => $apiToken,
	]);
}]);


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


			$app->group(['prefix' => '{reportId}/issue', 'as' => 'issue'], function($reportId) use ($app){

				// Get Issue By Id
				$app->get('{id}', [
					'as' => 'fetch', 
					'uses' => 'IssueController@getIssueById',
				]);

				// Add a new issue to the report
				$app->post('{id}', [
					'as' => 'submit',
					'uses' => 'IssueController@addNewIssueToReport',
				]);


			});
		});
	});
});