<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * untuk memasukan seeding yang di buat.
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(SettingTableSeeder::class);
    }
}
