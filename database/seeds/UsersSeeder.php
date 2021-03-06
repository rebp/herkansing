<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::create([
            'role_id' => 1,
            'photo_id' => null,
            'is_active' => 1,
            'name' => 'Rober',
            'email' => 'admin@rebp.nl',
            'about_me' => null,
            'password' => '$2y$10$LJqs8YNMH46jioWiepnzoecvXP0ivY7FX/ofHVyPlQ3CCIaEYLecm',
            
        ]);
    }
}
