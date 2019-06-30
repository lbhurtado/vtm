<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lester Hurtado', 
            'email' => 'lester@hurtado.ph',  
            'password' => bcrypt('Weetypie1')
        ]);
    }
}
