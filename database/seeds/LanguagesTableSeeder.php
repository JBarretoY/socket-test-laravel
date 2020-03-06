<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        
		$lan = array(
			array('name' => 'Alemán'),
			array('name' => 'Español'),
			array('name' => 'Francés'),
			array('name' => 'Italiano'),
			array('name' => 'Japonés'),
			array('name' => 'Mandarín'),
			array('name' => 'Portugués'),
		);

		DB::table('languages')->insert($lan);

    }
}
