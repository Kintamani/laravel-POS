<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * untuk menambah data setting.
     * 
     * card.png(belum)
     */
    public function run()
    {
        DB::table('setting')->insert(array([
            'nama_perusahaan'=>'Heymart',
            'alamat'=>'JL.Percobaan Cileunyi, Kab Bandung',
            'telpon'=>'0227836787',
            'logo'=>'logo.png',
            'kartu_member'=>'card.png',
            'diskon_member'=>'10',
            'tipe_nota'=>'0',
        ]));
    }
}
