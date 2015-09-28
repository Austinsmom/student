<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert(
            [
                [
                    'username' => 'tony',
                    'email' => 'tony@tony.fr',
                    'age' => 44
                ],
                [
                    'username' => 'john',
                    'email' => 'john@john.fr',
                    'age' => 40
                ],
            ]
        );
    }
}
