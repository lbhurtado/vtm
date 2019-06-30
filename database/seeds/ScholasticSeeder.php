<?php

use Illuminate\Database\Seeder;
use LBHurtado\Ballot\Models\{Ballot, Candidate, Position};

class ScholasticSeeder extends Seeder
{
    protected $ballot_code = 'ABC-0003';

    public function run()
    {
        $votes = [
            ['seat_id'=>1,  'position_name' => 'President',         'candidate_code'=>'MACAPAGAL'],
            ['seat_id'=>1,  'position_name' => 'Vice-President',    'candidate_code'=>'OSMEÑA'],
            ['seat_id'=>1,  'position_name' => 'Senator',           'candidate_code'=>'MANGLAPUS'],
            ['seat_id'=>2,  'position_name' => 'Senator',           'candidate_code'=>'MANAHAN'],
            ['seat_id'=>3,  'position_name' => 'Senator',           'candidate_code'=>'SUMULONG'],
            ['seat_id'=>4,  'position_name' => 'Senator',           'candidate_code'=>'RODRIGO'],
            ['seat_id'=>5,  'position_name' => 'Senator',           'candidate_code'=>'ANTONINO'],
            ['seat_id'=>6,  'position_name' => 'Senator',           'candidate_code'=>'OSIAS'],
            ['seat_id'=>7,  'position_name' => 'Senator',           'candidate_code'=>'KATIGBAK'],
            ['seat_id'=>8,  'position_name' => 'Senator',           'candidate_code'=>'ROY'],
            ['seat_id'=>9,  'position_name' => 'Senator',           'candidate_code'=>'ZIGA'],
            ['seat_id'=>10, 'position_name' => 'Senator',           'candidate_code'=>'PAREDES'],
            ['seat_id'=>11, 'position_name' => 'Senator',           'candidate_code'=>'CASTAÑO'],
            ['seat_id'=>12, 'position_name' => 'Senator',           'candidate_code'=>'BRIONES'],
            ['seat_id'=>1,  'position_name' => 'Party-List',        'candidate_code'=>'DISABLED'],
        ];

        $ballot = Ballot::whereCode($this->ballot_code)->first();
        foreach ($votes as $vote) {
            $candidate = Candidate::whereCode($vote['candidate_code'])->first();
            $ballot->updatePivot($candidate, $vote['seat_id']);
        }
    }
}
