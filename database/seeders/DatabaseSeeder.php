<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nik'=>'18101152610510',
            'nama'=>'admin',
            'jk'=>'laki-laki',
            'nohp'=>'082283327577',
            'alamat'=>'padang',
            'status_perkawinan'=>'belum kawin',
            'rolle' =>'admin',
            'level' =>'admin',
            'password'=>bcrypt('123456'),
            'photo' =>'default.jpg'

        ]);
        User::create([
            'nik'=>'18101152610511',
            'nama'=>'admin',
            'jk'=>'laki-laki',
            'nohp'=>'082283327577',
            'alamat'=>'padang',
            'status_perkawinan'=>'belum kawin',
            'rolle' =>'dokter umum',
            'level' =>'dokter',
            'password'=>bcrypt('123456'),
            'photo' =>'default.jpg'

        ]);
    }
}
