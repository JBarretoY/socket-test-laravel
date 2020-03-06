<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'       => 1,
            'name'     => 'SuperAdmin',
	        'lastname' => 'SuperAdmin',
	        'username' => 'superadmin',
	        'email'    => 'admin@admin.com',
	        'password' => bcrypt(123456),
	        'phone'    => '111111111',
	        'type'     => 1
        ]);

        DB::table('users')->insert([
            'id'=>2,
            'name'     => 'intermediary',
	        'lastname' => 'intermediary',
	        'username' => 'intermediary',
	        'email'    => 'intermediary@admin.com',
	        'password' => bcrypt(123456),
	        'phone'    => '111111111',
	        'type'     => 2,
        ]);

        DB::table('users')->insert([
            'id'=>3,
            'name'     => 'consultor',
            'lastname' => 'consultor',
            'username' => 'consultor',
            'email'    => 'consul@consul.com',
            'password' => bcrypt(123456),
            'phone'    => '111111111',
            'type'     => 4,
        ]);

        DB::table('balances')->insert([
            'id'=>1,
            'working' => 0,
            'available' => 0,
            'pending' => 0,
            'win' => 0,
            'user_id' => 3
        ]);

        DB::table('users')->insert([
            'id'=>4,
            'name'     => 'client',
            'lastname' => 'client',
            'username' => 'client',
            'email'    => 'client@client.com',
            'password' => bcrypt(123456),
            'phone'    => '111111111',
            'type'     => 3,
        ]);

        DB::table('balances')->insert([
            'id'=>2,
            'working' => 0,
            'available' => 10000000,
            'pending' => 0,
            'win' => 0,
            'user_id' => 4
        ]);

        DB::table('suscriptions')->insert([
            'user_id' => 4,
             'package_id' => 1,
             'num_projects_available' => 1244,
             'status' => 1,
             'renewal_date' => Carbon::now()->format('Y-m-d'),
             'last_renewal_date' => Carbon::now()->format('Y-m-d')
        ]);
    }
}
