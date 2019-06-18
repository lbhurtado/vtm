<?php

/*
 * You can place your custom package configuration in here.
 */
return [
	'files' => [
		'image' => [
			'seed' => env('IMAGE_SEED', 'tests/files/image.jpg'),
			'source' => env('BALLOT_SOURCE', storage_path('app/public/ballot.jpg')),
			'destination' => env('BALLOT_DESTINATION', storage_path('app/public/ballot.jpg')),
			'qrcode' => env('BALLOT_QRCODE', storage_path('app/qrcode.jpg')),
		],
		'temp' => storage_path('app')
	],
	'qrcode' => [
		'regex' => env('QRCODE_REGEX', '/([a-zA-Z]{3})-([\d]{4})/'),
		'test' => env('QRCODE_TEST', '0001-1234'),
		'dimensions' => [
			'w' => 500,
			'h' => 500,
			'x' => 0,
			'y' => 0,
		],
	],
];