<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Country::class);
        $this->call(Category::class);
        $this->call(SubCategory::class);
        $this->call(PackageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(LanguagesTableSeeder::class);
    }
}
