<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Cria um usuário no banco.
     * Chama a modeu User que é responsavel pelo campo do usuario.
     * e faz a chamada no DatadaseSeeder.
     */
    public function run()
    {
        User::create([
    		'name'     => 'Walace Santana',
    		'email'    => 'walace@teste.com',
    		'password' => bcrypt('123456')
    	]);
    }
}
