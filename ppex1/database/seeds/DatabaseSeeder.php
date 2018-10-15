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
      DB::table('users')->insert([
          'name' => 'test admin',
          'email' => 'a@a.com',
          'password' => bcrypt('a@a.com'),
      ]);
    }
}
