<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // définit dans le fichier ModelFactory dans le dossier database voir
        factory(App\User::class, 20)->create();
    }
}