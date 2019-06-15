<?php

namespace Tests\Unit;

use Tests\TestCase;
use LBHurtado\Ballot\Models\Ballot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LBHurtado\Ballot\Jobs\{GrabImage, ValidateImage};

class ExampleTest extends TestCase
{
	// use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	$ballot = Ballot::create();
  //   	(new GrabImage($ballot, storage_path('app/public/image.jpg')))->handle();
		// $job = new ValidateImage($ballot);
  //       $job->handle();

    	GrabImage::dispatch($ballot, storage_path('app/public/image.jpg'))->chain([
    		new ValidateImage($ballot)
    	]);

        $this->assertEquals(config('ballot.qrcode.test'), $ballot->code);
    }
}
