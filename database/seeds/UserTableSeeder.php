<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserTableSeeder extends Seeder {
    public function run() {
      factory(User::class, 9)->create();

      User::create([
        'name' => 'Edgar Gonzalez',
        'email' => 'edgar@mail.com',
        'password' =>bcrypt('12345678')
      ]);
    }
}
