<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            array(
            'id' => "1",
            'label' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
            'id' => "2",
            'label' => 'streamer',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            )
            
            ));
    }
}
