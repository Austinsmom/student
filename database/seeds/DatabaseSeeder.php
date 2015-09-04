<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // dans quel ordre faire les seeders
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);

        Model::reguard();
    }
}
