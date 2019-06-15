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

// use Intervention\Image\Image;
use LBHurtado\Ballot\Jobs\{GrabImage, ValidateImage};
use Illuminate\Support\Facades\Queue;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tally', function() {
	$data = [
		'PRESIDENT' => collect([
			[
				'candidate' => 'Marcos',
				'votes' => 100				
			],
			[
				'candidate' => 'Robredo',
				'votes' => 95				
			],
		]),
		'VICE-PRESIDENT' => collect([
			[
				'candidate' => 'Duterte',
				'votes' => 100				
			],
			[
				'candidate' => 'Cruz',
				'votes' => 95				
			],
		]),
		'SENATOR' => collect([
			[
				'candidate' => 'Hurtado',
				'votes' => 10	
			],
			[
				'candidate' => 'Dychitan',
				'votes' => 25				
			],
		]),
	];

    return response()->view('tally', ['positions' => $data], 200)->header('Content-Type', 'text/plain');
});

Route::get('/electronic-ballot', function() {
	$data = [
		'PRESIDENT' => collect([
			[
				'candidate' => 'Marcos',
				'votes' => 1				
			],
		]),
		'VICE-PRESIDENT' => collect([
			[
				'candidate' => 'Duterte',
				'votes' => 1				
			],
		]),
		'SENATOR' => collect([
			[
				'candidate' => 'Hurtado',
				'votes' => 10	
			],
			[
				'candidate' => 'Dychitan',
				'votes' => 25				
			],
		]),
	];

    return response()->view('electronic-ballot', ['ballotId' => '1234', 'positions' => $data], 200)->header('Content-Type', 'text/plain');
});

Route::get('/physical-ballot', function() {
    // return Image::make(storage_path('app/public/ballot.png'))->fit(640, 480)->response('png');
    return Image::make(storage_path('app/public/image.jpg'))
		->fit(640, 900)
    	->response('jpg');
});

Route::get('/status', function() {
	// $QRCodeReader = new Libern\QRCodeReader\QRCodeReader();
	// $qrcode_text = $QRCodeReader->decode(storage_path('app/public/ballot.jpg'));

	return response()->view('status', [
		'precinct' => '0001A',
		'lgu' => 'Currimao, Ilocos Norte',
		'qrCode' => '0001-1234'
	], 200)->header('Content-Type', 'text/plain');
});

Route::get('/screen', function () {
    return view('screen');
});

// Route::get('/test', function () {
// 	$ballot = Ballot::first();

// 	// GrabImage::dispatch($ballot, storage_path('app/public/image.jpg'))->chain([new ValidateImage($ballot)]);

// 	// GrabImage::withChain([
// 	// 	(new ValidateImage($ballot))->onConnection('sync')->onQueue('default')
// 	// ])->dispatch($ballot, storage_path('app/public/image.jpg'))->onConnection('sync')->onQueue('default');

// 	Queue::bulk([
// 		new GrabImage($ballot, storage_path('app/public/image.jpg')),
// 		// new ValidateImage($ballot),
// 	]);

// 	$ballot = Ballot::first();

// 	Queue::bulk([
// 		// new GrabImage($ballot, storage_path('app/public/image.jpg')),
// 		new ValidateImage($ballot),
// 	]);
// });

