<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('roles')->insert([['name' => 'admin'], ['name' => 'hospital'], ['name' => 'doctor'], ['name' => 'patient'],]);

        DB::table('genders')->insert([['name' => 'Male'], ['name' => 'Female'], ['name' => 'Others'],]);

        DB::table('blood_groups')->insert([
            ['name' => 'A+'], ['name' => 'A-'], ['name' => 'B+'], ['name' => 'B-'],
            ['name' => 'O+'], ['name' => 'O-'], ['name' => 'AB+'], ['name' => 'AB-'], ['name' => 'Don\'t know']
        ]);

        DB::table('specialists')
            ->insert([
                ['name' => 'Allergists/Immunologists '], ['name' => 'Anesthesiologists'],
                ['name' => 'Cardiologists'], ['name' => 'Dermatologists'],
            ]);

        DB::table('users')->insert([
            ['role_id' => '1', 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin'), 'remember_token' => str_random(10),],
            ['role_id' => null, 'name' => 'hospital', 'email' => 'hospital@gmail.com', 'password' => bcrypt('111111'), 'remember_token' => str_random(10),],
            ['role_id' => null, 'name' => 'doctor', 'email' => 'doctor@gmail.com', 'password' => bcrypt('111111'), 'remember_token' => str_random(10),],
            ['role_id' => null, 'name' => 'patient', 'email' => 'patient@gmail.com', 'password' => bcrypt('111111'), 'remember_token' => str_random(10),],
        ]);
    }
}
