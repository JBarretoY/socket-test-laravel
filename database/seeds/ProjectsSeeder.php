<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'id'=>1,
            'name' => 'nombre',
			'description' => 'des1 des2 des3',
			'budget' => 12323,
			'country_id' => 1,
			'client_id' => 4,
			'consulter_id' => 3,
			'status' => 1,
        ]);

        DB::table('projects')->insert([
            'id'=>2,
            'name' => 'nombre2',
			'description' => 'des4 des5 des3',
			'budget' => 33333,
			'country_id' => 1,
			'client_id' => 4,
			'consulter_id' => 3,
			'status' => 2,
        ]);
    }
}
