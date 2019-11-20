<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' =>'admin',
          'email' =>'admin@gmail.com',
          'password'=> bcrypt('1234567kiki?'),
          'role_id'=>'1',
        ]);
    }
}
