<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Str;
use \App\Category;
class CategoryTableSeeder extends Seeder {
    public function run() {
        factory(Category::class, 20)->create();
    }
}
