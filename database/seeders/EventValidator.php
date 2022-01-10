<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EventValidator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
    {
        DB::table('users')->insert([
            'name' =>'Validator',
            'email' => 'validator@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role'=>'4',
            'address' => '42 annakhil rabat',
            'fname' =>'Hicham',
            'lname'=>'Haddadi'
        ]);
    }

}
