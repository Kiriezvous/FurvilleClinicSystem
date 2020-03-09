<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            'name' => 'Franz Angeles',
            'email' => 'angelesfranz@gmail.com',
            'password' => bcrypt('12345678'),
            'image' => 'noimage.jpg',
        ]);
    }
}
