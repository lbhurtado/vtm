<?php

use Illuminate\Database\Seeder;
use LBHurtado\Ballot\Models\{Ballot, Candidate, Position};

class FreehandSeeder extends Seeder
{
    protected $ballot_code = 'ABC-0001';

    public function run()
    {
        $votes = [
            ['seat_id'=>1,  'position_name' => 'President',         'candidate_code'=>'MACAPAGAL'],
            ['seat_id'=>1,  'position_name' => 'Vice-President',    'candidate_code'=>'PELAEZ'],
            ['seat_id'=>1,  'position_name' => 'Senator',           'candidate_code'=>'MANGLAPUS'],
            ['seat_id'=>2,  'position_name' => 'Senator',           'candidate_code'=>'SUMULONG'],
            ['seat_id'=>3,  'position_name' => 'Senator',           'candidate_code'=>'OSIAS'],
            ['seat_id'=>4,  'position_name' => 'Senator',           'candidate_code'=>'KATIGBAK'],
            ['seat_id'=>5,  'position_name' => 'Senator',           'candidate_code'=>'ROY'],
            ['seat_id'=>6,  'position_name' => 'Senator',           'candidate_code'=>'ZIGA'],
            ['seat_id'=>7,  'position_name' => 'Senator',           'candidate_code'=>'GONZALES'],
            ['seat_id'=>8,  'position_name' => 'Senator',           'candidate_code'=>'CLIMACO'],
            ['seat_id'=>9,  'position_name' => 'Senator',           'candidate_code'=>'ROMERO'],
            ['seat_id'=>10, 'position_name' => 'Senator',           'candidate_code'=>'HIDALGO'],
            ['seat_id'=>11, 'position_name' => 'Senator',           'candidate_code'=>'CASTAÑO'],
            ['seat_id'=>12, 'position_name' => 'Senator',           'candidate_code'=>'ALONTO'],
            ['seat_id'=>1,  'position_name' => 'Party-List',        'candidate_code'=>'DISABLED'],
        ];

        $ballot = Ballot::whereCode($this->ballot_code)->first();
        foreach ($votes as $vote) {
            $candidate = Candidate::whereCode($vote['candidate_code'])->first();
            $ballot->updatePivot($candidate, $vote['seat_id']);
        }
    }
}
