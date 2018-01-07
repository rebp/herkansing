<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Administrator',
        ]);

        $author = Role::create([
            'name' => 'Author',
        ]);

        $subscriber = Role::create([
            'name' => 'Subscriber',
        ]);
    }
}
