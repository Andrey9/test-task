<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++){
            $category = new \App\Models\Category([
                'name' => "Category $i",
                'description' => "This is the description of category $i"
            ]);

            $category->save();
        }
    }
}
