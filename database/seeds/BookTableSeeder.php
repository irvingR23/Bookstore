<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Str;
use \App\Book;

class BookTableSeeder extends Seeder {

    public function run() {
      factory(Book::class, 300)->create();
    }
}
