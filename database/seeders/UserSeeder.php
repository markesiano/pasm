<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Este es un objeto pre creado para que se pueda acceder sin que sea aleatorio
        User::create([
            'name' => 'Jesus Jimenez',
            'email' => 'markesiano@live.com.mx',
            'rol' => 'Estudiante',                           //Se agrega el campo "rol" con valor "Psicólogo"
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Santiago Priego',
            'email' => 'santiago@hotmail.com',
            'rol' => 'Psicólogo',                           //Se agrega el campo "rol" con valor "Psicólogo"
            'password' => bcrypt('12345678')
        ]);
        User::factory(99)->create();


        //
    }
}
