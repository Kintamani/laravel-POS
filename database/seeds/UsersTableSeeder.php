<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * untuk penambahaan Contoh isi/data Users level(admin)
     * ket : 
     * level 1(admin), 2(user)
     * bcrypt (untk engkripsi)
     * 
     * admin.png(belum)
     */
    public function run()
    {
        DB::table('users')->insert(array([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>bcrypt('admin'),
            'foto'=>'admin.png',
            'level'=>1
        ]));

        DB::table('users')->insert(array([
            'name'=>'user',
            'email'=>'user@example.com',
            'password'=>bcrypt('user'),
            'foto'=>'user.png',
            'level'=>2
        ]));
    }
}
