<?php



namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role'=>'1',
            'language' =>'english',
            'country' =>'morocco',
            'address' => '42 annakhil rabat',
            'gender' =>'male',
            'fname' =>'Hicham',
            'lname'=>'Haddadi'
        ]);
    }
}
