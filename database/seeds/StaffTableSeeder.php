<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            'name' => 'Franz Asperilla',
            'email' => 'asperillafranz@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
