<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mario Alejandro Jimenez',
            'email' => 'cuentas.alexjimenez@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://heuristic-pare-9619de.netlify.app/'
        ]);

        $user2 = User::create([
            'name' => 'Mario Alejandro',
            'email' => 'marioche041096@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://heuristic-pare-9619de.netlify.app/'
        ]);

        $user3 = User::create([
            'name' => 'Mario Jimenez',
            'email' => 'correo@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://heuristic-pare-9619de.netlify.app/'
        ]);


    }
}
