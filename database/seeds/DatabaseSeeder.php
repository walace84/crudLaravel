<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /*
     * Faz a chamada da Seeder UsersTableSeeder.
     * php artisan db:seed
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}
