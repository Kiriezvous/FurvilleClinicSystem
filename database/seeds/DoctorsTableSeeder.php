<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'name' => 'Adrian Torio',
            'email' => 'torioadrian@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
