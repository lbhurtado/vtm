<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LBHurtado\Ballot\Models\{Ballot, Position};
use LBHurtado\Ballot\Actions\UpdateBallotCandidateAction;
use GuzzleHttp\Client;

class BallotController extends Controller
{

	protected $client;

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->client = new Client;
	}

    public function index()
    {
    	$ballot = Ballot::latest()->first();
    	$ballot_code = $ballot->code;
	    $url = "http://vtm.app/api/ballot/candidate";
		$response = $this->client->request('GET', $url, ['json' => compact('ballot_code')]);

		dd($response);

    	$positions = Position::all();

        return view('ballot', compact('positions'));
    }

    public function store(Request $request)
    {
    	// $ballot = Ballot::latest()->first();
    	// $ballot_code = $ballot->code;

    	$ballot_code = $request->input('ballot_code');
    	$candidate_code = $request->input('candidate_code');
    	$seat_id = $request->input('seat_id');

	    $client = new \GuzzleHttp\Client();
	    $url = "http://vtm.app/api/ballot/candidate";
	   
	    $response = $client->request('POST', $url, ['json' => compact('ballot_code', 'candidate_code', 'seat_id')]);
	  
	  	$positions = Position::all();

        return view('ballot', compact('positions'));
    }
}
