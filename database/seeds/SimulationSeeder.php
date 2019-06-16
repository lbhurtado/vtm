<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use LBHurtado\Ballot\Models\{Ballot, Position, Candidate};

class SimulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$positions = Position::all();
    	$candidates = Candidate::all();

       	for ($i = 0; $i <= 3; $i++) {
       		$ballot = Ballot::create(['code' => Str::random(5)]);
   			
    		$positions->each(function ($position) use ($ballot, $candidates) {
    			$seats = $position->seats;
    			$candidates->where('position_id', $position->id)->random($seats)->each(function ($candidate, $key) use ($ballot) {
    				$seat = $key + 1;
    				$ballot->updatePivot($candidate, $seat);    				
    			});
    		});
       	}
    }
}
