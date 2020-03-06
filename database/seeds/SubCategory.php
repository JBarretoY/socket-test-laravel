<?php

use Illuminate\Database\Seeder;

class SubCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///Automatización & Robotica
        DB::table('sub_categories')->insert([
            'id'=>1,
            'category_id'=>1,
            'name'=>'Automatización y control industrial'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>2,
            'category_id'=>1,
            'name'=>'Ingeniería de procesos'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>3,
            'category_id'=>1,
            'name'=>'Reingeniería de procesos'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>4,
            'category_id'=>1,
            'name'=>'Operaciones y otros'
        ]);
        //////Contabilidad & Finanzas
        DB::table('sub_categories')->insert([
            'id'=>5,
            'category_id'=>2,
            'name'=>'Administración de empresas'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>6,
            'category_id'=>2,
            'name'=>'Contabilidad y finanzas'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>7,
            'category_id'=>2,
            'name'=>'Impuestos internos'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>8,
            'category_id'=>2,
            'name'=>'Rentabilidad y otros'
        ]);
        /////Estrategia & Gestión
        DB::table('sub_categories')->insert([
            'id'=>9,
            'category_id'=>3,
            'name'=>'Estrategias de inversión'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>10,
            'category_id'=>3,
            'name'=>'Negocios internacionales'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>11,
            'category_id'=>3,
            'name'=>'Operaciones'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>12,
            'category_id'=>3,
            'name'=>'Plan de negocios'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>13,
            'category_id'=>3,
            'name'=>'Productividad'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>14,
            'category_id'=>3,
            'name'=>'Procesos y otros'
        ]);
        /////Marketing & Ventas
        DB::table('sub_categories')->insert([
            'id'=>15,
            'category_id'=>4,
            'name'=>'Branding'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>16,
            'category_id'=>4,
            'name'=>'Estrategia de ventas'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>17,
            'category_id'=>4,
            'name'=>'Estrategia de marketing'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>18,
            'category_id'=>4,
            'name'=>'Investigación de mercado'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>19,
            'category_id'=>4,
            'name'=>'Relaciones públicas'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>20,
            'category_id'=>4,
            'name'=>'UX y otros'
        ]);
        //Recursos Humanos
        DB::table('sub_categories')->insert([
            'id'=>21,
            'category_id'=>5,
            'name'=>'Cambio organizacional'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>22,
            'category_id'=>5,
            'name'=>'Estructura de empresas'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>23,
            'category_id'=>5,
            'name'=>'Estructura organizacional'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>24,
            'category_id'=>5,
            'name'=>'Reclutamiento y otros'
        ]);
        //Seguridad & Legal
        DB::table('sub_categories')->insert([
            'id'=>25,
            'category_id'=>6,
            'name'=>'Propiedad intelectual'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>26,
            'category_id'=>6,
            'name'=>'Contrato'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>27,
            'category_id'=>6,
            'name'=>'Derecho informático'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>28,
            'category_id'=>6,
            'name'=>'Ciber seguridad y otros'
        ]);
        //Transformación Digital e Innovación
        DB::table('sub_categories')->insert([
            'id'=>29,
            'category_id'=>7,
            'name'=>'Brecha digital'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>30,
            'category_id'=>7,
            'name'=>'Cultura digital'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>31,
            'category_id'=>7,
            'name'=>'Gestión de la innovación'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>32,
            'category_id'=>7,
            'name'=>'Plataformas digitales'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>33,
            'category_id'=>7,
            'name'=>'Estrategia digital y otros'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>34,
            'category_id'=>7,
            'name'=>'Plataformas digitales'
        ]);
        //Web & Data Science
        DB::table('sub_categories')->insert([
            'id'=>35,
            'category_id'=>8,
            'name'=>'Big Data'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>36,
            'category_id'=>8,
            'name'=>'Diseño Web'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>37,
            'category_id'=>8,
            'name'=>'E-commerce'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>38,
            'category_id'=>8,
            'name'=>'Machine learning'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>39,
            'category_id'=>8,
            'name'=>'Plataformas digitales'
        ]);
        DB::table('sub_categories')->insert([
            'id'=>40,
            'category_id'=>8,
            'name'=>'Cloud computing y otros'
        ]);
    }

}
