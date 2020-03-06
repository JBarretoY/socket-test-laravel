<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert(
            [
                [
                    'name'            => 'Básico',
                    'num_project'     => 3,
                    'created_at'      => \Carbon\Carbon::now(),
                    'price'           => 0,
                    'description'     => 'Publica 3 Proyectos por mes 6 al año máx. Cada publicación se muestra por 15 días.',
                    'time_publish'    => 15,
                    'time_num_roject' => 3 ///PROJECT
                ],
                [
                    'name'            => 'Premium',
                    'num_project'     => 5,
                    'created_at'      => \Carbon\Carbon::now(),
                    'price'           => 0,
                    'description'     => 'Publica 5 proyectos por mes / 30 al año máx. Publicación se muestra por 30 días.',
                    'time_publish'    => 30,
                    'time_num_roject' => 30 ///PROJECT
                ],
                [
                    'name'            => 'Ultra',
                    'num_project'     => -1,
                    'created_at'      => \Carbon\Carbon::now(),
                    'price'           => 29,
                    'description'     => 'Publica 5 proyectos por mes / 30 al año máx. Publicación se muestra por 30 días.',
                    'time_publish'    => 60,
                    'time_num_roject' => 30 ///PROJECT
                ]
            ]
        );
    }
}
