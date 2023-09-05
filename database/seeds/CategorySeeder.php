<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'baju',
        ]);
        DB::table('categories')->insert([
            'name' => 'Celana',
        ]);
        DB::table('categories')->insert([
            'name' => 'Jaket',
        ]);
        DB::table('categories')->insert([
            'name' => 'Topi',
        ]);
    }
}
