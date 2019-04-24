<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'role' => 'SuperAdmin',
            'name' => 'Sidi Farid',
            'surname' => 'Raoui Aguirre',
            'imagen' => 'user.png',
            'telefono' => '929194560',
            'empresa' => 'GambitoCorp',
            'email' => 'asesor.pedro@gmail.com',
            'password' => '$2y$10$MCI8yBBqtUHkO.1wUj4Uxe7mOlmjEtRcLipdQj.1iIyCNlc3tCg.e',
            'remember_token' => 'q4HaXiN2fPs0G8dMitXVwnA4VWuR3ipgL8fi7esJvlzLHcIaE7ygs7v6yBBW',
        ]);
    }

}
