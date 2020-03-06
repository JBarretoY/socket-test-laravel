<?php

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'=>1,
            'name'=>'Automatización & Robotica'
        ]);
        DB::table('categories')->insert([
            'id'=>2,
            'name'=>'Contabilidad & Finanzas'
        ]);
        DB::table('categories')->insert([
            'id'=>3,
            'name'=>'Estrategia & Gestión'
        ]);
        DB::table('categories')->insert([
            'id'=>4,
            'name'=>'Marketing & Ventas'
        ]);
        DB::table('categories')->insert([
            'id'=>5,
            'name'=>'Recursos Humanos'
        ]);
        DB::table('categories')->insert([
            'id'=>6,
            'name'=>'Seguridad & Legal'
        ]);
        DB::table('categories')->insert([
            'id'=>7,
            'name'=>'Transformación Digital e Innovación'
        ]);
        DB::table('categories')->insert([
            'id'=>8,
            'name'=>'Web & Data Science'
        ]);
    }
}
