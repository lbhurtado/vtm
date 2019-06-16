<?php

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

use Illuminate\Http\Request;
use LBHurtado\Ballot\Models\{Ballot, BallotCandidate, Position, Candidate};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tally', function() {
	$positions = Position::all()->sortBy('id');
	$index = 1;

    return response()
    	->view('tally', compact('positions'), 200)
    	->header('Content-Type', 'text/plain')
    	;
})->name('status');

Route::get('/electronic-ballot/{ballot}', function(Ballot $ballot) {
	$positions = $ballot->positions;

    return response()
    	->view('electronic-ballot', compact('ballot', 'positions'), 200)
    	->header('Content-Type', 'text/plain')
    	;
})->name('electronic-ballot');

Route::get('/physical-ballot/{ballot}', function(Ballot $ballot) {

	return view('physical-ballot', compact('ballot'));
})->name('physical-ballot');

Route::get('/status/{ballot}', function(Ballot $ballot) {
	$precinct = '0001A';
	$lgu = 'Currimao, Ilocos Norte';

	return response()
		->view('status', compact('precinct', 'lgu', 'ballot'), 200)
		->header('Content-Type', 'text/plain')
		;
})->name('status');

Route::get('/screen', function () {
	$ballot = Ballot::latest()->first();

    return view('screen', compact('ballot'));
});

Route::get('/screen/{ballot_code}', function ($ballot_code) {
	$ballot = Ballot::whereCode($ballot)->first();

    return view('screen', compact('ballot'));
});

